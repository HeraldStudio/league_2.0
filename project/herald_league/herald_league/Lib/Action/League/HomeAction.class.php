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
			$this -> getCommentAndAnswer( $album[$i]['id'], 2);//相册被评论类型id是2
			
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
			$this -> getCommentAndAnswer( $picture[$i]['id'], 3);//图片被评论类型id是3
		}
	}
	
	/*
	
		社团交流区控制函数
	
	*/
	
	public function communion()
	{
		/*获取URL参数*/
		$albumid = intval($this -> _param('leagueid'));
		
		/*获取评论信息*/
		$result = getCommentAndAnswer( $albumid, 1);//社团被评论id是1
		
	}
	
	/*
	
		获取当前页面对应的评论和回复
		
		第一个参数是被评论者的id
		
		第二个参数是被评论者的类型
	
		这个函数应该改成共有函数的
		
	*/
	
	public function getCommentAndAnswer( $commentedid, $commenttype )
	{
		/*获取评论信息*/

		$Comment = M('Comment');
		$comment = $Comment -> where('commed_id ='.$commentedid.' AND commed_type ='.$commenttype) -> select();
		$secondlooptimes = count($comment);
		
		for( $j = 0; $j < $secondlooptimes; $j++ )
		{	
			/*评论基本信息*/
			
			//这里添加代码获取更详细的评论信息
			
			$this -> content = $comment[$j]['content'];
			
			/*获取该评论下对应的回复*/

			$Answer = M('Answer');
			$answer = $Answer -> where('comment_id ='.$comment[$j]['id']) -> select();
			$this -> assign('answer', $answer);
		}
		$this -> display();
	}
}
?>