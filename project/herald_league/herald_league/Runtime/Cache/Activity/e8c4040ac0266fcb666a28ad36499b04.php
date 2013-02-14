<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($activityInf["activity_name"]); ?>--活动详情</title>
<link href="__ROOT__/Public/Css/activity.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/footer.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Css/header.css" />
<script type="text/javascript">
function changeAttention(activityid,action)
  {
    var xmlhttp;
    if (window.XMLHttpRequest)
  	{
  		xmlhttp=new XMLHttpRequest();
  	}
	else//for ie6
  	{
  		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}

    xmlhttp.onreadystatechange=function()
    {
      if(xmlhttp.readyState == 4 && xmlhttp.status==200)
      {
        var message=new Array();
            message[ 1]='关注成功'
            message[ 2]='取消关注成功'
            message[-1]='已经关注'
            message[-2]='关注失败'
            message[-3]='还未关注，无法取消'
            message[-4]='取消关注失败'
            message[-5]='非法的操作'
            message[-6]='请求的活动不存在'
            message[-7]='请先登录'
            message[-8]='请以个人用户登录'
            alert(message[xmlhttp.responseText]);
            if(xmlhttp.responseText == 1)
            {
              document.getElementById("attended").style.display="inline";
              document.getElementById("notattended").style.display="none";
            }
            else if(xmlhttp.responseText ==2)
            {
              document.getElementById("attended").style.display="none";
              document.getElementById("notattended").style.display="inline";
            }
      }
    }
    xmlhttp.open("GET","<?php echo U('Activity/Activity/changeAttention');?>/activityid/"+activityid+"/action/"+action,true);
    xmlhttp.send();
  }</script>
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
     	  <a href="#" >活动</a>
		</div>
		<div id="wall" class="navigation_link">
		  <a href="#" >海报墙</a>
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
	  </div>
	  <div id="love">
	    <a href="#" id="love_image"></a>
	  </div>
	  <div id="user"><a href="#"><?php echo ($userName); ?></a></div>
	  <div id="exit"><a href="#">退出</a></div>
	  <?php else: ?>
	  <div id="user"><a href="#">登录</a></div><?php endif; ?>
	</div>
	<div id="main_body">
	  <div id="main_body_inner">
	    <div id="inner_left">
		  <div id="left_content">
            <div id="left1">
		      <div id="title"><?php echo ($activityInf["activity_name"]); ?></div>
			  <a href="javascript:void(0)" onclick="javascript:changeAttention(<?php echo ($activityInf["id"]); ?>,'add')" id="notattended" class="attention" <?php if($isattended == 1): ?>style="display:none"<?php endif; ?>> 
			    <div id="attention_img">
			    </div>
			    <div id="attention_text">关注
			    </div>			  
			  </a>
			  <a href="javascript:void(0)" onclick="javascript:changeAttention(<?php echo ($activityInf["id"]); ?>,'del')" class="attention" id="attended" <?php if($isattended == 0 ): ?>style="display:none"<?php endif; ?>>
			    <div id="attention_text">取消关注
			    </div>			  
			  </a>
			  <div id="shuoming">
			    <div id="biaoqian">
			    <?php if($class == null): ?><div id="biaoqian1" class="bq">没有标签</div>
			    <?php else: ?>
				  <?php if(is_array($class)): foreach($class as $key=>$c): ?><div id="biaoqian1" class="bq"><?php echo ($c); ?></div><?php endforeach; endif; endif; ?>
				</div>
				<div id="redu">热度：<?php echo ($activityInf["activity_count"]); ?>
				</div>
				<a href="#" id="pinglun">5条评论
				</a>
			  </div>
		    </div>
			<div id="left2">
			  <div id="time" class="information">
                <div id="time_img">
				</div>
				<div id="time_text">开始时间:<?php echo ($activityInf["start_time"]); ?>,结束时间:<?php echo ($activityInf["end_time"]); ?>
				</div>
				
				
			  </div>
			  <div id="place" class="information">
			    <div id="place_img">
				</div>
				<div id="place_text">地点 :  <?php echo (($activityInf["activity_place"])?($activityInf["activity_place"]):"还没有地址"); ?>
				</div>
			  </div>
			  <div id="host" class="information">
			    <div id="host_img">
				</div>
				<div id="host_text">主办：<?php echo ($activityInf["activity_org_name"]); ?>
				</div>
			  </div>
			  <div id="contact" class="information">
			    <div id="contact_img">
				</div>
				<div id="contact_text">联系方式：<?php echo ($activityInf["contact_info"]); ?>
				</div>
			  </div>
			</div>
			<div id="left3">
			  <div id="activity_introduction">
			    <?php echo (($activityInf["activity_introduce"])?($activityInf["activity_introduce"]):"没有介绍"); ?>
			  </div>
			  <div id="activity_img"><img width=500px height=300px src="__ROOT__/Uploads/LeaguePost/Large/<?php echo (($activityInf["activity_post_add"])?($activityInf["activity_post_add"]):"default.jpg"); ?>"/>
			  </div>
			  <div id="share">
			     <div id="share_text">分享至
				 </div>
			  </div>
			</div>
			<div id="left4">
			  <div id="remark">
			    <div id="user_img">
				</div>
				<div id="remark_content">
				  <div id="top">
				    <div id="username">赵亮
					</div>
					<div id="remark_time"><pre>2012-12-22  12:12:12</pre>
					</div>
				  </div>
				  <div id="middle">
				    <p>本站通过聚合各团体组织信息、活动信息，
				       形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
				       同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
				    </p>
				  </div>
				  <div id="bottom">
				    <a href="#" id="btn_replay">回复</a>
				  </div>
				</div>
			  </div>
			   <div id="remark">
			    <div id="user_img"><img src="__ROOT__/Public/images/small.jpg" alt="" />
				</div>
				<div id="remark_content">
				  <div id="top">
				    <div id="username">赵亮
					</div>
					<div id="remark_time"><pre>2012-12-22  12:12:12</pre>
					</div>
				  </div>
				  <div id="middle">
				    <p>本站通过聚合各团体组织信息、活动信息，
				       形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
				       同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
				    </p>
				  </div>
				  <div id="bottom">
				    <a href="#" id="btn_replay">回复</a>
				  </div>
				</div>
			  </div>
			   <div id="remark">
			    <div id="user_img"><img src="__ROOT__/Public/images/small.jpg" alt="" />
				</div>
				<div id="remark_content">
				  <div id="top">
				    <div id="username">赵亮
					</div>
					<div id="remark_time"><pre>2012-12-22  12:12:12</pre>
					</div>
				  </div>
				  <div id="middle">
				    <p>本站通过聚合各团体组织信息、活动信息，
				       形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
				       同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
				    </p>
				  </div>
				  <div id="bottom">
				    <a href="#" id="btn_replay">回复</a>
				  </div>
				</div>
			  </div>
			  <div id="replay">
			    <div id="replay_top">你的回应：
				</div>
				<div id="replay_text"><textarea type="text"></textarea>
				</div>
				<div id="replay_bottom">
				  <a href="#" id="submit">回应
				  </a>
				  <a href="#" id="aite">@某人
				  </a>
				</div>
			  </div>
			</div>
		  </div> 
		</div>
		<div id="inner_right">
		  <div id="right_content">
		    <div id="right1">
		      <div id="guanzhu_title">此活动关注者
			  </div>
		    </div>
			<div id="right2">
			  <div id="touxiang">
				<?php if(is_array($attender)): $i = 0; $__LIST__ = $attender;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><a href="#"id="touxiang1" class="tx">
				  	<div id="touxiang_img1" class="touxiang_img"><img width=50px height=50px src="__ROOT__/Uploads/UserAvatar/<?php echo (($a["user_avatar_add"])?($a["user_avatar_add"]):"default.jpg"); ?>" alt="" />
				  	</div>
				  	<div id="touxiang_text1" class="touxiang_text"><?php echo ($a["nick_name"]); ?>
				  	</div>
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
				
				
				
				
				
				
			  </div>
			</div>
			<div id="right3">
			  <div id="interest_title">猜你感兴趣...
			  </div>
			</div>
			<div id="right4">
			  <ul>
			    <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				<li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				<li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				<li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				<li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				<li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				<li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
			  </ul>
			</div>
		  </div>
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
<a id="toTop" href="#" style="display:none;width:72px;height:74px;" title="返回顶部"></a>
   <script type="text/javascript">
   window.onscroll=function()
   {
   		var top=document.documentElement.scrollTop||document.body.scrollTop;
		var toTop=document.getElementById("toTop");
   		if(top>400)
		{
			toTop.style.display="inline";
		}
		else
		{
			toTop.style.display="none";
		}
   };
   var toTop=new function()
   {
   		var Timer=null;
   		function $id(id){return typeof id=="string"?document.getElementById(id):id;};
		this.goto=function(objName)
		{
			$id(objName).onclick=function()
			{
				var top=document.documentElement.scrollTop||document.body.scrollTop;
				startNove();
				return false;
			};
			var startNove=function()
			{
				if(Timer)clearInterval(Timer);
				Timer=setInterval(doMove,30);
			};
			var doMove=function()
			{
				var iSpeed=0;
				var top=document.documentElement.scrollTop||document.body.scrollTop;
				iSpeed=(0-top)/5;
				iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);
				if(Math.abs(iSpeed)<1&&Math.abs(0-top)<1)
				{
					clearInterval(Timer);
					Timer=null;
				}
				window.scrollTo(0,(top+iSpeed));
			};
		};
   };
   toTop.goto("toTop");
   </script>
<body>
</html>