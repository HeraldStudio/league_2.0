<?php
/*

*名称：社团空间控制器类

*功能: 显示社团空间信息

*作者：Tairy

*更新日期：2012.01.14

*/

class HomeAction extends Action
{	
	private $pagetitle = array(
		'dt' => '大厅',
		'zls' => '资料室',
		'lyb' => '留言版',
		'yxg' => '影像馆'
		);
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
		$this -> activityid = intval($this -> _param('actid'));

		/*获取社团信息*/
		$League = D('LeagueInfo');
		$Attention = D('Attention');
		$league = $League -> getLeagueInfo ( $leagueid );

		/*获取活动信息*/
		$Activity = D('Activity');
		$this -> activity = $Activity -> getActivityInfoById ( $this -> activityid )[0];
		$this -> assign('league', $league);

		/*活动标签*/
		$class = $Activity->getClass($this -> activity['id']);
        $this -> assign('class',$class);
        /*活动状态*/
        $this -> actiitystate = $Activity -> getActivityState( $this -> activityid );
		/*判断关注状态*/
		$data = array('user_id' => 1,
			'attended_id' => $leagueid,
			'isleague' => 1
		 );

		$this -> attentionstate = $Attention -> getAttentionState( $data );
		$this -> display();
    }
    /*

	函数功能：社团资料室控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/02/20
	
	*/
    public function infoRoom()
    {
    	/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));

		/*获取社团信息*/
		$League = D('LeagueInfo');
		$Attention = D('Attention');
		$league = $League -> getLeagueInfo ( $leagueid );

		$this -> assign( 'league', $league );

		$this -> display();
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
		$comment = $Comment -> getCommentInfo( $album, $Comment -> getCommentedType("album") );

		$this -> assign( 'comment', $comment );

		$Answer = D('Answer');
		$answer = $Answer -> getAnswerInfo( $comment );

		$this -> assign( 'answer', $answer );

		if( !empty( $_POST['submit'] ) )
		{
			$this -> judgeIfSubData( $Comment, $Answer, $Comment -> getCommentedType("album") );
		}
		
        $this -> display();
	}

	/*

	函数功能：用户关注控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/

	public function attention()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		$action = $this -> _param('action');
		$data['user_id'] = 2;
		$data['attended_id'] = $leagueid;
		$data['isleague'] = 1;
		$Attention = D('Attention');
		$result = $Attention -> changeAttention ( $data, $action );
		$this -> error( $result );
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
		$comment = $Comment -> getCommentInfo( $picture, $Comment -> getCommentedType("picture") );

		$this -> assign( 'comment', $comment );

		$Answer = D('Answer');
		$answer = $Answer -> getAnswerInfo( $comment );

		$this -> assign( 'answer', $answer );

		if( !empty( $_POST['submit'] ) )
		{
			$this -> judgeIfSubData( $Comment, $Answer, $Comment -> getCommentedType("picture") );
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
		$comment = $Comment -> getCommentInfo( $leagueid, $Comment -> getCommentedType("league") );//1表示社团交流区信息

		$this -> assign( 'comment', $comment );

		$Answer = D ( 'Answer' );
		$answer = $Answer -> getAnswerInfo( $comment );

		$this -> assign('answer', $answer);

		$this -> leagueid = $leagueid;

		if( !empty( $_POST['submit'] ) )
		{
			$this -> judgeIfSubData( $Comment, $Answer, $Comment -> getCommentedType("league") );
		}
		$this -> display();
	}

	/*

	函数功能：社团信息管理控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/18
	
	*/

	public function leagueAdmin()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));

		$LeagueInfo = D( "LeagueInfo" );
		$leagueinfo = $LeagueInfo -> getLeagueInfo( $leagueid );
		$this -> assign ( "leagueinfo", $leagueinfo );

		$this -> leagueid = $leagueid;

		if( !empty( $_POST['league_name'] ))
		{
			$updateresult = $LeagueInfo -> updateLeagueInfo ( $_POST['leagueid'], $_POST );
			$this -> judgeAddState( $updateresult );
		}
		$this -> display();
	}

	/*

	函数功能：社团注册控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/18
	
	*/

	public function leagueRegister()
	{
		if (!empty($_POST['league_name']))
		{
			$LeagueInfo = D( "LeagueInfo" );
			$registerresult = $LeagueInfo -> addNewLeague( $_POST );
			$this -> judgeAddState ( $registerresult );
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

	/*

	函数功能：判断是否提交数据
	
	参数信息：第一个参数是包含所有评论的数组

			  第二个参数是包含所有回复的数组

			  第三个参数是被评论者类型

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/18
	
	*/

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

	/*

	函数功能：社团空间公共框架控制函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/02/02
	
	*/

	public function club()
	{
		/*获取URL参数*/
		$this -> gettitle = $this -> _param('title');
		$this -> leagueid = intval($this -> _param('leagueid'));
		$this -> activityid = intval($this -> _param('actid'));

		if($this -> leagueid == 0)
		{
			echo "<script>history.go(-1);</script>";
			return ;
		}

		$League = D('LeagueInfo');
		$league = $League -> getLeagueInfo ( $this -> leagueid );
		$this -> assign( 'league', $league );

		switch($this -> gettitle)
		{
			case 'dt':
			/*获取活动信息*/
			$Activity = D('Activity');
			$activity = $Activity -> getActivityInfoByLeague ( $this -> leagueid );
			if(!empty($activity))
			{
				$this -> isactivityempty = false;
				if(!$this -> activityid)
				$this -> activityid = $activity[0]['id'];

				/*获取活动的关注信息*/
				$Attention = D('Attention');
				$User = D('User');
				$attention = $Attention -> getActivityAttention( $this -> activityid );
				$userinfo = $User -> getUserInfo( $attention );
				$this -> assign( 'userinfo', $userinfo );
				$this -> assign('activity', $activity);
			}
			else
			{
				$this -> isactivityempty = true;
			}
			break;
			case 'zls':
			/*获取关注信息*/
			$Attention = D('Attention');
			$User = D("User");

			$attention = $Attention -> getLeagueAttention( $this -> leagueid );
			$userinfo = $User -> getUserInfo( $attention );
			$this -> assign( 'userinfo', $userinfo );
			break;
			case 'lyb':
			break;
			case 'yxg':
			break;
		}

		/*小标签内容*/
		$Attention = D('Attention');
		$this -> attentionnum = $Attention -> getAttentionLeagueNum( $this -> leagueid );
		$this -> classname = $League -> getClassName ( $league[0]['league_class'] );
		$this -> streetname = $League -> getStreetName ( $league[0]['street_id'] );
		$this -> title = $this -> pagetitle[$this -> gettitle];

		$this -> display();
	}
}
?>