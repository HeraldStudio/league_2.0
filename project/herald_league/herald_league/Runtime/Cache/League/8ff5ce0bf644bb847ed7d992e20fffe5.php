<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($title); ?></title>
<link rel="stylesheet" type="text/css" href="__Public__/Css/club.css" />
<link rel="stylesheet" type="text/css" href="__Public__/Css/dating.css"/>
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Css/header.css" />
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.js"></script>
<script type="text/javascript" src="__ROOT__/Public/js/jquery.min.js"></script> 
<script language="javascript" src="__ROOT__/Public/Js/login/GreyFrame.js" ></script>
<script type="text/javascript">
				frameMatch = new GreyFrame("MyGreyFrame", 500, 300);
				frameContect = new GreyFrame("ContactFrame", 350, 120);
</script>
<script type="text/javascript">
 function logout()
{
		$.ajax({
			url:'<?php echo U('/Public/Logout/');?>',
			success:function(){
			$("#islogin").hide();
			$("#notlogin").show();
			location.reload();//todo
			}
		})
}
</script>
<script type="text/javascript">
    function changeLeagueAttention(leagueid,action)
    {
        $.getJSON("<?php echo U('/League/Home/changeAttention');?>",{"leagueid":leagueid,"action":action},function(data,status){
            if(data.status!=1) //失败了
                alert(data.info);
            else
            {
                $(".guanzhu1").toggle();
                $(".guanzhu2").toggle();

            }
        });
    };

</script>
<style type="text/css">
a:link {
	color: #fff;
}
a:visited {
	color: #fff;
}
a:hover {
	color: #34c5c3;
}
</style>
</head>
<body>
<div id="main">
    <div id="header">
			<div id="logo">
			</div>
			<div id="navigation">
				<div id="herald" class="navigation_link">
					<a href="#" >先声</a>
				</div>
				<div id="map" class="navigation_link">
					<a href="#" >社团</a>
				</div>
				<div id="activity" class="navigation_link">
					 <a href="__APP__" >活动</a>
				</div>
				<div id="wall" class="navigation_link">
					<a href="<?php echo U('Activity/Activity/wall/');?>" >海报墙</a>
				</div>
			</div>
			<div id="search">
						<form onsubmit="checkInput('searchkey','关键字','请输入关键字')">
							 <input type="text" value="请输入关键字" style="color:#999;"onfocus="this.style.color='#000000';if(this.value=='请输入关键字'){this.value=''}" onblur="this.style.color='#999';if(this.value==''){this.value='请输入关键字'}"/>
						</form>
						<a href="#" id="search_image">
						</a>
		</div>
		<?php if($islogin == 1): ?><div id="message">
							<a href="#" id="message_image"></a>
							<div id="m_num">5</div>
					</div>
					<div id="love">
							<a href="#" id="love_image"></a>
					</div>
			
			<div id="user"><a href="#"><?php echo ($name); ?></a></div>
			<div id="exit"><a href="javascript:;"  onclick="logout()">退出</a></div>
		<?php else: ?>
			<div id="user"><a href="<?php echo U('/User/Login/');?>" target="MyGreyFrame">登录</a></div><?php endif; ?>

	</div>
	<div id="main_body">
	  <div id="main_body_inner">
	    <div id="danganshi">
		<?php if($isactivityempty): ?><h1 style = "margin: 100px;">该社团尚未添加活动，这里需要前台做一个替换页面</h1>
		<?php else: ?>
		  <?php switch($gettitle): case "zls": ?><iframe name="i" src="__APP__/League/Home/infoRoom/leagueid/<?php echo ($leagueid); ?>" id = 'zls'></iframe>
				<div id="inner_right">
				<div id="right_content">
				<div id="right1">
				  <div id="guanzhu_title">我们的关注者
				  </div>
				  <a href="#" id="more1" class="more">
				  </a>
				  <a href="#" id="more2" class="more">
				  </a>
				</div>
				<div id="right2">
				  <div id="touxiang">
				  	<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vu): $mod = ($i % 2 );++$i;?><a href="#"id="touxiang1" class="tx">
						  <div id="touxiang_img1" class="touxiang_img">
						  	<img src="__Uploads__/UserAvatar/m_<?php echo ($vu["user_avatar_add"]); ?>" alt="" />
						  </div>
						  <div id="touxiang_text1" class="touxiang_text">
						  	<?php echo ($vu["true_name"]); ?>
						  </div>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
				  </div>
				</div>
				</div>
				</div><?php break;?>
		  	<?php case "dt": ?><iframe name="i" src="__APP__/League/Home/index/leagueid/<?php echo ($leagueid); ?>/actid/<?php echo ($activityid); ?>" id = 'dt'>
				</iframe>
				<div id="inner_right">
				<div id="right_content">
				<div id="right3">
				  <div id="interest_title">我们的活动
				  </div>
				  <a href="#" id="more3" class="more">
				  </a>
				  <a href="#" id="more4" class="more">
				  </a>
				</div>
				<div id="right4">
				  <ul>
				  	<?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><li>
			    		<a href="__APP__/League/Home/club/title/dt/leagueid/<?php echo ($leagueid); ?>/actid/<?php echo ($vi["id"]); ?>">
			    			<?php echo ($vi["activity_name"]); ?>
			    		</a>
			    	</li><?php endforeach; endif; else: echo "" ;endif; ?>
				  </ul>
				</div>
				<div id="right1">
				  <div id="guanzhu_title">此活动的关注者
				  </div>
				  <a href="#" id="more1" class="more">
				  </a>
				  <a href="#" id="more2" class="more">
				  </a>
				</div>
				<div id="right2">
				  <div id="touxiang">
				  	<?php if(is_array($userinfo)): $i = 0; $__LIST__ = $userinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vu): $mod = ($i % 2 );++$i;?><a href="#"id="touxiang1" class="tx">
						  <div id="touxiang_img1" class="touxiang_img">
						  	<img src="__Uploads__/UserAvatar/m_<?php echo ($vu["user_avatar_add"]); ?>" alt="" />
						  </div>
						  <div id="touxiang_text1" class="touxiang_text">
						  	<?php echo ($vu["true_name"]); ?>
						  </div>
						</a><?php endforeach; endif; else: echo "" ;endif; ?>
				  </div>
				</div>
				</div>
				</div><?php break;?>
		  	<?php case "lyb": ?><iframe name="i" src="__APP__/League/Home/communion/leagueid/<?php echo ($leagueid); ?>" id = 'lyb'>
		  		</iframe><?php break;?>
		  	<?php case "yxg": ?><iframe name="i" src="__APP__/League/Home/album/leagueid/<?php echo ($leagueid); ?>" id = 'yxg'>
		  		</iframe><?php break;?>
		  	<?php case "zpq": ?><iframe name="i" src="__APP__/League/Home/picture/albumid/<?php echo ($albumid); ?>" id = 'yxg'>
		  		</iframe><?php break; endswitch; endif; ?>
		</div>
	  </div>
	</div>
	<div id="footer">
	  <div id="footer_link">
	    <a href="#" id="f_about" class="link">关于我们</a>
		<a href="#" id="f_contact" class="link">联系我们</a>
		<a href="#" id="f_join" class="link">加入我们</a>
	  </div>
	  <div id="footer_text">
      <pre> &copy; Copyright 2001-2013 herald.seu.edu.cn All rights reserved</pre>
	  </div>
	</div>
  </div>
  <div id="gua1" class="gua">
  </div>
  <div id="gua2" class="gua">
  </div>
  <div id="club_lable">
    <div id="lable_top">
	  <div id="touxiang2">
	  	<img src="__Uploads__/LeagueAvatar/s_<?php echo ($league['avater_address']); ?>" />
	  </div>
	  <div id="name">
	  	<?php echo ($league['league_name']); ?>
	  </div>
	  <div id="address">
	  	<?php echo ($classname); ?>--<?php echo ($streetname); ?>
	  </div>
	</div>
	<div id="lable_bottom">
	  <div id="guanzhu" class = "guanzhu1"<?php if($isattended == true): ?>style="display:none"<?php endif; ?>onclick="javascript:changeLeagueAttention(<?php echo ($league['id']); ?>,'add')">关注
	  </div>
	  <div id="guanzhu" class = "guanzhu2" <?php if($isattended == false): ?>style="display:none"<?php endif; ?>onclick="javascript:changeLeagueAttention(<?php echo ($league['id']); ?>,'del')">已关注
	  </div>
	  <div id="number">
	  	<?php echo ($attentionnum); ?>人关注
	  </div>
	  <a href="#" id="chumen">
	    <div id="chumen_img">
		</div>
		<div id="chumen_text">出门
		</div>
	   </a>
	</div>
  </div>
  <?php switch($gettitle): case "dt": ?><div id="wall1">
		</div>
		<div id="wall2">
		</div>
		<div id="door1">
		</div>
		<div id="door2">
		</div>
		<div id="door3">
		</div>
		<a id="arrow1" href="#" title="出门">
		</a>
		<a id="arrow2" href="__APP__/League/Home/club/title/yxg/leagueid/<?php echo ($leagueid); ?>" title="影像馆">
		</a>
		<a id="arrow3" href="__APP__/League/Home/club/title/lyb/leagueid/<?php echo ($leagueid); ?>" title="来聊两句">
		</a>
		<a id="arrow4" href="__APP__/League/Home/club/title/zls/leagueid/<?php echo ($leagueid); ?>" title="资料库">
		</a><?php break;?>
  	<?php case "zls": ?><div id="wall1">
		</div>
		<div id="wall2">
		</div>
  		<a id="arrow1" href="__APP__/League/Home/club/title/dt/leagueid/<?php echo ($leagueid); ?>" title="返回大厅">
		</a><?php break;?>
  	<?php case "lyb": ?><div id="door1">
		</div>
		<div id="wall3">
		</div>
  		<a id="arrow2" href="__APP__/League/Home/club/title/dt/leagueid/<?php echo ($leagueid); ?>" title="返回大厅">
		</a><?php break;?>
  	<?php case "yxg": ?><div id="door2">
		</div>
		<div id="wall3">
		</div>
  		<a id="arrow3" href="__APP__/League/Home/club/title/dt/leagueid/<?php echo ($leagueid); ?>" title="返回大厅">
		</a><?php break;?>
  	<?php case "zpq": ?><div id="door2">
		</div>
		<div id="wall3">
		</div>
  		<a id="arrow3" href="__APP__/League/Home/club/title/yxg/leagueid/<?php echo ($leagueid); ?>" title="回到相册">
		</a><?php break; endswitch;?>
  <div id="danganshi_biaoti">
  	<?php echo ($title); ?>
  </div>
</body>
</html>