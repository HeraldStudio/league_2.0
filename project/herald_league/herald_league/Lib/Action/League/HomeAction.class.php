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
		'yxg' => '影像馆',
		'zpq' => '照片墙'
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
		$this -> activity = $Activity -> getActivityInfoById ( $this -> activityid );
        $this -> activity =$this->activity[0];
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

		$this -> attentionstate = $Attention -> getAttentionState( $data );trace('aa',$this -> attentionstate);
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
		$this -> leagueid = intval($this -> _param('leagueid'));

		/*获取相册信息*/
		$Album = D('League_album');
		$album = $Album -> where('league_id ='.$this -> leagueid) -> select();
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

	public function imgComment()
	{
		/*获取URL参数*/
		$pictureid = intval($this -> _param('pictureid'));

		$Picture = D('League_picture');
		$this -> picture = $Picture -> where('id='.$pictureid) -> find();

		// /$this -> assign( 'picture', $picture );

		// $Comment = D('Comment');
		// $comment = $Comment -> getCommentInfo( $picture, $Comment -> getCommentedType("picture") );

		// $this -> assign( 'comment', $comment );

		// $Answer = D('Answer');
		// $answer = $Answer -> getAnswerInfo( $comment );

		// $this -> assign( 'answer', $answer );

		// if( !empty( $_POST['submit'] ) )
		// {
		// 	$this -> judgeIfSubData( $Comment, $Answer, $Comment -> getCommentedType("picture") );
		// }

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
		 $this -> albumid = intval($this -> _param('albumid'));

		 if($this -> leagueid <= 0)
		 {
		 	echo "<script>history.go(-1);</script>";
		 	return ;
		 }
  //       /*控制登陆*/
		// $heraldSession = D('UserSessionControl');
  //       if($heraldSession->islogin())
  //       {
  //           $this->assign('islogin',1);
  //           $this->assign('name',$heraldSession->getUserName());
  //           if($heraldSession->getUserType()==1)
  //               $uid=$heraldSession->getUserID();
  //           else
  //               $uid =0;
  //       }
  //       else
  //       {
  //           $this->assign('islogin',0);
  //           $uid = 0;
  //       }
  //       $this->assign('uid',$uid);

		
		 $League = D('LeagueInfo');
		 $league = $League -> getLeagueInfo ( $this -> leagueid );
		 //print_r($league);
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
		 	case 'zpq':
		 	break;
		 }

		// /*小标签内容*/
		 $Attention = D('Attention');
		 $this -> attentionnum = $Attention -> getAttentionLeagueNum( $this -> leagueid );
		 $this -> classname = $League -> getClassName ( $league['league_class'] );
		 $this -> streetname = $League -> getStreetName ( $league['street_id'] );

		 $this -> title = $this -> pagetitle[$this -> gettitle];

		 $this -> display();
	}
    public function changeAttention()
    {
         /*
         * 功能 ：添加,删除关注者
         * 参数 : 活动id，动作
         * 返回 :       1=>'关注成功',
                        2=>' 取消关注成功',
                       -1=>'已经关注',
                        -2=>'关注失败',
                        -3=>' 还未关注，无法取消',
                        -4=>' 取消关注失败',
                        -5=>' 非法的操作',
                        -6=>'请求的社团不存在'
                        -7=>'请先登录'
                        -8=>'请以个人用户登录'

          */
        $leagueID = intval($this->_param('leagueid'));
        $action = $this->_param('action');
        $leagueInfo = D('LeagueInfo');
        $message=array(
            1=>'关注成功',
            2=>' 取消关注成功',
            -1=>'已经关注',
            -2=>'关注失败',
            -3=>' 还未关注，无法取消',
            -4=>' 取消关注失败',
            -5=>' 非法的操作',
            -6=>'请求的社团不存在',
            -7=>'请先登录',
            -8=>'请以个人用户登录',
        );
        if(!$leagueInfo->isexist($leagueID))
        {
            $this->error($message[-6]);
        }
        else
        {
            $heraldSession = D('UserSessionControl');
            if( !$heraldSession->islogin())
            {
                $this->error($message[-7]);
            }
            else {
                if($heraldSession->getUserType() != 1)
                {
                    $this->error($message[-8]);
                }
                else
                {
                    $attention = D('Attention');
                    $data['user_id'] = intval($heraldSession->getUserID());
                    $data['attended_id']=$leagueID;
                    $data['isleague'] = 1;
                    $result = $attention->changeAttention($data, $action);
                    if($result>0)
                    {
                        $this->success($message[$result]);
                    }
                    else
                    {
                        $this->error($message[$result]);
                    }
                }
            }
        }
    }
}
?>