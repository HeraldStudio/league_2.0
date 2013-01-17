<?php
/*

*名称：社团空间控制器类

*功能: 显示社团空间信息

*作者：Tairy

*更新日期：2012.01.14

*/

class HomeAction extends Action
{	
	/*

	函数功能：社团空间首页控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
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

	函数功能：社团信息页面控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
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

	函数功能：社团相册控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
	
	public function album()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		
		/*获取相册信息*/
		$Album = D('League_album');
		$album = $Album -> where('league_id ='.$leagueid) -> select();
		$this -> assign( 'album', $album );

		$Comment = D('Comment');
		$comment = $Comment -> getCommentInfo( $album, 2 );

		$this -> assign( 'comment', $comment );

		$Answer = D('Answer');
		$answer = $Answer -> getAnswerInfo( $comment );

		$this -> assign( 'answer', $answer );

		if( !empty( $_POST['submit'] ) )
		{
			$this -> judgeIfSubData( $Comment, $Answer, 2 );
		}
		
        $this -> display();
	}
	
	/*

	函数功能：图片页面控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
	
	public function picture()
	{
		/*获取URL参数*/
		$albumid = intval($this -> _param('albumid'));
		
		/*获取图片信息*/
		$Picture = D('League_picture');
		$picture = $Picture -> where('album_id='.$albumid) -> select();

		$this -> assign( 'picture', $picture );

		$Comment = D('Comment');
		$comment = $Comment -> getCommentInfo( $picture, 3 );

		$this -> assign( 'comment', $comment );

		$Answer = D('Answer');
		$answer = $Answer -> getAnswerInfo( $comment );

		$this -> assign( 'answer', $answer );

		if( !empty( $_POST['submit'] ) )
		{
			$this -> judgeIfSubData( $Comment, $Answer, 3 );
		}
		$this -> display();
	}
	
	/*

	函数功能：社团交流区控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
	
	public function communion()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));

		$Comment = D ( 'Comment' );
		$comment = $Comment -> getCommentInfo( $leagueid, 1);//1表示社团交流区信息

		$this -> assign( 'comment', $comment );

		$Answer = D ( 'Answer' );
		$answer = $Answer -> getAnswerInfo( $comment );

		$this -> assign('answer', $answer);

		$this -> leagueid = $leagueid;

		if( !empty( $_POST['submit'] ) )
		{
			$this -> judgeIfSubData( $Comment, $Answer, 1);
		}
		$this -> display();
	}

	/*

	函数功能：判断数据写入结果
	
	参数信息：参数是从模型中返回的结果

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/

	public function judgeAddState( $result )
	{
		if ( $result == "error" )
		{
			$this -> error('数据对象创建错误');
		}
		elseif ( is_int( $result ) ) 
		{
			$this -> success('操作成功！');
		}
		else
		{
			$this -> error('写入错误！');
		}

	}

	public function judgeIfSubData( $Comment, $Answer, $commedtype )
	{
		if( !empty( $_POST['content_c'] ) )
		{
			$commentresult = $Comment -> addCommentInfo( 1, 1, $_POST['subdata_c'], $commedtype, $_POST );

			$this -> judgeAddState( $commentresult );
		}
		elseif( !empty( $_POST['content_a'] ) )
		{
			$answerresult = $Answer -> addAnswerinfo( $_POST['subdata_a'], 1, 1, $_POST );

			$this -> judgeAddState( $answerresult );
		}
		else
		{
			return;
		}
	}
}
?>