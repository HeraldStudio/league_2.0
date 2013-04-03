<?php
/*

*名称：用户空间页面

*功能: 实现用户空间页面上内容的现实和相应的功能

*作者：Tairy

*更新日期：2012.12.17

*/
class IndexAction extends Action 
{

   /*

	函数功能：用户空间首页
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
    public function index()
    {
    	/*获取URL参数*/
	    $userid = intval( $this -> _param( 'userid' ) );

	    /*get user information*/
		$User = D('User');
		$userinfo = $User -> getUserInfo( $userid );
		$this -> assign('userinfo', $userinfo );
		
		/*get attention league information*/
		$result = $this -> attentionLeague( $userid );
		$leagueinfo = $result[0];
		$lastactivity = $result[1];
		//print_r($leagueinfo);
		$this -> assign ( 'leagueinfo', $leagueinfo );
		$this -> assign( 'lastactivity', $lastactivity );

		/*get attention activity information*/
		$activityinfo = $this -> attentionActivity ( $userid );
		$this -> assign ( 'activityinfo', $activityinfo );
		//print_r($activityinfo);
		/*user info for header*/
        $heraldSession = D('UserSessionControl'); //控制会话
        if($heraldSession->isLogin())
        {
            $this->assign('islogin',1);
            $this->assign('userName',$heraldSession->getUserName());
            $uid=$heraldSession->getUserID();
            $Comment = D('Comment');
		 	$newCommentNum = $Comment -> getNewCommentNum($uid, $Comment -> getCommentedType($heraldSession->getUserType()==1?"user":"league"));
	
		 	$Answer = D('Answer'); 
		 	$newAnswerNum = $Answer -> getNewAnswerNum($uid,$Comment -> getCommentedType($heraldSession->getUserType()==1?"user":"league"));
			
		 	$this -> newAnswerAndComment = $newCommentNum + $newAnswerNum;
        }
        else
        {
            $uid = 0;
        }

        $activity = D('Activity');
        $this->assign('intrestActivity',$activity->getInterest(20));//感兴趣的活动，最多3*7个
        $leagueinfo = D('LeagueInfo');
        $this->assign('intrestLeague',$leagueinfo->getInterest());
		$this -> display();
    }

/*

	函数功能：更新用户信息页面
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
    public function updateInfo ()
    {
    	/*获取URL参数*/
	    $userid = intval( $this -> _param( 'userid' ) );

		$User = D('User');
		$userinfo = $User -> getUserInfo( $userid );

		

		$this -> assign('userinfo', $userinfo );

		$this -> display();
	    
    }
    /*

	函数功能：修改头像页面
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
    public function changeAvatar ()
    {
    	/*获取URL参数*/
	    $userid = intval( $this -> _param( 'userid' ) );

	    $User = D('User');
		$userinfo = $User -> getUserInfo( $userid );

		$this -> avataraddress = $userinfo['user_avatar_add'];
		$this -> userid = $userid;

		if (!empty($_FILES)) 
		{
            //如果有文件上传 上传附件
            $this->_upload();
        }

	    $this -> display();
    }

    /*

	函数功能：用户留言版页面
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
    public function comment()
    {
    	/*获取URL参数*/
		$userid = intval($this -> _param('userid'));

		$Comment = D ( 'Comment' );
		$comment = $Comment -> getCommentInfo( $userid, $Comment -> getCommentedType("user") );//1表示社团交流区信息

		$this -> assign( 'comment', $comment );

		$Answer = D ( 'Answer' );
		$answer = $Answer -> getAnswerInfo( $comment );

		$this -> assign('answer', $answer);

		$this -> userid = $userid;

		if( !empty( $_POST['submit'] ) )
		{
			$this -> addCommentAndAnswerInfo( $Comment, $Answer, $Comment -> getCommentedType("user") );
		}

    	$this -> display();
    }

    /*

	函数功能：关注的社团页面

	参数信息：用户id

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/02/03
	
	*/

    public function attentionLeague( $userid )
    {
    	$Attention = D('Attention');
    	$LeagueInfo = D('LeagueInfo');
    	$Activity = D('Activity');
    	$attentionleague = $Attention -> getAttentionLeague ( $userid );
    	//print_r($attentionleague);
    	foreach ( $attentionleague as $attentionleagues ) 
    	{	
    		$leagueinfo[$attentionleagues['id']] = $LeagueInfo -> getLeagueInfo($attentionleagues['attended_id'] );
    		$leagueinfo[$attentionleagues['id']]['attentionnum'] = $Attention -> getAttentionLeagueNum($attentionleagues['attended_id']);
    		$lastactivity[$attentionleagues['attended_id']] = $Activity -> getActivityInfoByLeague( $attentionleagues['attended_id'] );
    	}
    	return array( $leagueinfo, $lastactivity );
    }
    /*

	函数功能：关注的活动页面
	
	参数信息：用户id

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
    public function attentionActivity ( $userid )
    {
		$Attention = D('Attention');
		$Activity = D('Activity');
		$League = D('LeagueInfo');

		$attentionactivity = $Attention -> getAttentionActivity( $userid );
		foreach ( $attentionactivity as $attentionactivitys ) 
    	{
    		$activityinfo[$attentionactivitys['id']] = $Activity -> getActivityInfoById( $attentionactivitys['attended_id'] );
    		$activityinfo[$attentionactivitys['id']]['activitystate'] = $Activity -> getActivityState( $attentionactivitys['attended_id'] );
    		$activityinfo[$attentionactivitys['id']]['attentionnum'] = $Attention -> getAttentionActivityNum($attentionactivitys['attended_id']);  
    		$activityinfo[$attentionactivitys['id']]['leagueavatar'] = $League -> getleagueAvaterAdd( $activityinfo[$attentionactivitys['id']]['league_id']);
    	}
		return $activityinfo;
    }

    /*

	函数功能：文件上传函数
	
	参数信息：无参数

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/16
	
	*/
    protected function _upload() 
    {
        import('@.ORG.UploadFile');
        //导入上传类
        $upload = new UploadFile();
        //设置上传文件大小
        $upload->maxSize            = 3292200;
        //设置上传文件类型
        $upload->allowExts          = explode(',', 'jpg,gif,png,jpeg');
        //设置附件上传目录
        $upload->savePath           = '../Uploads/UserAvatar/';
        //设置需要生成缩略图，仅对图像文件有效
        $upload->thumb              = true;
        // 设置引用图片类库包路径
        $upload->imageClassPath     = '@.ORG.Image';
        //设置需要生成缩略图的文件后缀
        $upload->thumbPrefix        = 'm_,s_';  //生产2张缩略图
        //设置缩略图最大宽度
        $upload->thumbMaxWidth      = '400,100';
        //设置缩略图最大高度
        $upload->thumbMaxHeight     = '400,100';
        //设置上传文件规则
        $upload->saveRule           = 'uniqid';
        //删除原图
        $upload->thumbRemoveOrigin  = false;

        if ( !$upload->upload() ) 
        {
            //捕获上传异常
            $this->error( $upload -> getErrorMsg() );
        } 
        else 
        {
            //取得成功上传的文件信息
            $uploadList = $upload -> getUploadFileInfo();
            import('@.ORG.Image');
            //给m_缩略图添加水印, Image::water('原文件名','水印图片地址')
            Image::water($uploadList[0]['savepath'] . 'm_' . $uploadList[0]['savename'], APP_PATH.'Tpl/Public/Images/logo.png');
            $_POST['image'] = $uploadList[0]['savename'];
        }

        $User = D( "User" );
        $result = $User -> setAvatarAddress ( $_POST['subdata'], $_POST['image'] );
        
        if ( $result ) 
        {
            $this->success('上传图片成功！');
        } 
        else 
        {
            $this->error('上传图片失败!');
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

	public function addCommentAndAnswerInfo( $Comment, $Answer, $commedtype )
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

    
}
?>