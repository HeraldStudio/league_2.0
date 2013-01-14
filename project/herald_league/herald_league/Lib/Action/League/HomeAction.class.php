<?php
/*

*名称：社团空间控制器类

*功能: 显示社团空间信息

*作者：Tairy

*更新日期：2012.12.21

*/
class HomeAction extends Action
{	
	/*
	
		社团空间首页控制器函数
	
	*/
	
    public function index()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		
		/*获取社团信息*/
		$League = M('League_info');
		$league = $League -> where('id ='.$leagueid) -> select();
		//print_r($l);
		/*获取活动信息*/
		$Activity = M('Activity');
		$activity = $Activity -> where('league_id ='.$leagueid) -> select();
		
		$this -> assign('activity', $activity);
		$this -> assign('league', $league);
		$this -> display();
    }
	
	/*
	
		社团信息控制器函数
	
	*/
	
	public function information()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		
		/*获取社团信息*/
		$Information = D('League_info');
		$information = $Information -> where('id ='.$leagueid) -> select();
		$this -> assign('information', $information);
		$this ->display();
	}
	
	/*
	
		相册控制器函数
	
	*/
	
	public function album()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		
		/*获取相册信息*/
		$Album = D('League_album');
		$album = $Album -> where('league_id ='.$leagueid) -> select();
		$firstlooptimes = count($album);
		
		for( $i = 0; $i < $firstlooptimes; $i++ )
		{
			/*相册基本信息*/
			$this -> albumid = $album[$i]['id'];
			$this -> albumname = $album[$i]['album_name'];
			$this -> albuminfo = $album[$i]['album_info'];
			$this -> albumcoveradd = $album[$i]['album_cover_add'];
			
			/*获取相册评论信息*/
			$result = getCommentAndAnswer( $album[$i]['id'], 2);//相册被评论类型id是2
		
			/*这个数组包含每条评论的所有信息*/
			$commentinfo = $result[0];
			
			/*这个数组包含改评论下的回复的所有信息*/
			$answer = $result[1];
			
			//这里添加代码可获取更详细的评论信息
			$this -> content = $commentinfo['content'];
			
			$this -> assign('answer', $answer);
			$this -> display();
			
		}
	}
	
	/*
	
		图片页面控制器函数
	
	*/
	
	public function picture()
	{
		/*获取URL参数*/
		$albumid = intval($this -> _param('albumid'));
		
		/*获取图片信息*/
		$Picture = D('League_picture');
		$picture = $Picture -> where('album_id='.$albumid) -> select();
		$firstlooptimes = count($picture);
		
		/*获取相册信息*/
		for( $i = 0; $i < $firstlooptimes; $i++ )
		{
			/*图片基本信息*/
			$this -> pictureid = $picture[$i]['id'];
			$this -> picturename = $picture[$i]['picture_name'];
			$this -> pictureinfo = $picture[$i]['picture_info'];
			$this -> smallpicadd = $picture[$i]['small_picture_add'];
			$this -> largepicadd = $picture[$i]['large_picture_add'];
			$this -> iscover = $picture[$i]['is_cover'];
			//$this -> display();
			/*获取图片评论信息*/
			$result = getCommentAndAnswer( $picture[$i]['id'], 3 );//相册被评论类型id是2
			
			/*这个数组包含每条评论的所有信息*/
			$commentinfo = $result[0];

			//这里添加代码可获取更详细的评论信息
			$this -> content = $commentinfo['content'];
			
			/*这个数组包含改评论下的回复的所有信息*/
			$answer = $result[1];
			$this -> assign('answer', $answer);

			
			$this -> display();
		}
	}
	
	/*
	
		社团交流区控制函数
	
	*/
	
	public function communion()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));

		$Comment = M('Comment');
		$comment = $Comment -> where('commed_id ='.$leagueid.' AND commed_type = 1') -> select();
		$this -> assign( 'comment', $comment );

		$Answer = M('Answer');
		//print_r($comment);
		foreach ($comment as $comments) 
		{
			$answer[$comments['id']]= $Answer -> where('comment_id ='.$comments['id'].' AND answering_type = 1') -> select();
		}
		//print_r($answer);

		$this -> assign('answer', $answer);
		$this -> display();
		

		









		
		/*获取评论信息*/
		//$result = getCommentAndAnswer( $albumid, 1);//社团被评论id是1
		
		/*这个数组包含每条评论的所有信息*/
		//$commentinfo = $result[0];
		
		//这里添加代码可获取更详细的评论信息
		//$commingid = $commentinfo['comming_id'];//评论者id
		//$commingtype = $commentinfo['comming_type'];//评论者类型 1 表示普通用户 2 表示社团用户
		//$this -> content = $commentinfo['content'];

		/*这个数组包含改评论下的回复的所有信息*/
		//$answer = $result[1];//二维数组
		
		//这里添加代码获取更详细的回复信息
		//$this -> assign('answer', $answer);

		/*获取评论者信息*/
		//$comminginfo = getCommingInfo( $commingid, $commingtype );//评论者详细信息数组

		/*评论者详细信息*/
		//这里添加代码获取更详细评论者的信息
		//$this -> commingname = $comminginfo[0];
		
		//$this -> display();
	}
}
?>