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
		$this -> assign( 'album', $album );

		/*获取评论和回复信息*/
		//$Comment = M('Comment');
		//$Answer = M('Answer');

		//foreach ($album as $albums) 
		//{
		//	$comment[$albums['id']] = $Comment -> where( 'commed_id ='.$albums['id'].' AND commed_type = 2') -> select();
		//}

		//foreach ($comment as $comments) 
		//{
		///	foreach ($comments as $eachcomment) 
			///{
			//	$answer[$eachcomment['id']] = $Answer -> where( 'comment_id ='.$eachcomment['id'] ) -> select();
			//}
	//	}

		$result = getCommentAndAnswer( $album, 2 );

		$comment = $result[0];
		$answer = $result[1];

		$this -> assign( 'comment', $comment );
		$this -> assign( 'answer', $answer );
		
        $this -> display();
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

		$this -> assign( 'picture', $picture );

		$result = getCommentAndAnswer( $picture, 3 );

		$comment = $result[0];
		$answer = $result[1];
		
		$this -> assign( 'comment', $comment );
		$this -> assign( 'answer', $answer );
		
		$this -> display();
	}
	
	/*
	
		社团交流区控制函数
	
	*/
	
	public function communion()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));

		$Comment = M('Comment');
		$comment = $Comment -> where('commed_id ='.$leagueid.' AND commed_type = 1') -> select();//对社团的评论 commed_id = 1
		$this -> assign( 'comment', $comment );

		$Answer = M('Answer');
		
		foreach ($comment as $comments) 
		{
			$answer[$comments['id']]= $Answer -> where( 'comment_id ='.$comments['id'] ) -> select();
		}

		$this -> assign('answer', $answer);
		$this -> display();
	}
}
?>