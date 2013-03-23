<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>个人主页</title>

<link href="__Public__/Css/personal.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/footer.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__Public__/Css/header.css" />

<script src="__Public__/Js/jquery.tools.min.js"></script>  
  <!-- standalone page styling (can be removed) -->
<link rel="stylesheet" type="text/css" href="__Public__/Css/standalone.css"/>
<link rel="stylesheet" href="__Public__/Css/tabs.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__Public__/Css/tabs-panes.css" type="text/css" media="screen" />
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
<script type="text/javascript" src="__ROOT__/Public/js/jquery.min.js"></script> 
<script language="javascript" src="__ROOT__/Public/Js/login/GreyFrame.js" ></script>
<script type="text/javascript">
				frameMatch = new GreyFrame("MyGreyFrame", 500, 300);
				frameContect = new GreyFrame("ContactFrame", 350, 120);
</script>
</head>
<body>
  <div id="main">
    <div id="header">
      <a  href ="__APP__" id="logo">
      </a>
      <div id="navigation">
        <div id="herald" class="navigation_link">
          <a href="http://herald.seu.edu.cn" >先声</a>
        </div>
        <div id="map" class="navigation_link">
          <a href="<?php echo U('League/Index');?>" >社团</a>
        </div>
        <div id="wall" class="navigation_link">
          <a href="<?php echo U('Activity/Activity/wall/');?>" >海报墙</a>
        </div>
      </div>
      <div id="search">
            <form name = "search" method = "post" action = "__ROOT__/herald_league/index.php/Public/Search/search">
					 <input name = "search_text" type="text" value="请输入关键字" id = "search_text" style="color:#999;"onfocus="this.style.color='#000000';if(this.value=='请输入关键字'){this.value=''}" onblur="this.style.color='#999';if(this.value==''){this.value='请输入关键字'}"/>
					 <input type = "submit" value = "搜索" id="search_image">
				</form>
    </div>
    <?php if($islogin == 1): ?><div id="message">
              <a href="#" id="message_image"></a>
              <div id="m_num">5</div>
          </div>
          <div id="love">
              <a href="#" id="love_image"></a>
          </div>
      
      <div id="user"><a href="#"><?php echo ($userName); ?></a></div>
      <div id="exit"><a href="javascript:;"  onclick="logout()">退出</a></div>
    <?php else: ?>
      <div id="user"><a href="<?php echo U('/User/Login/');?>" target="MyGreyFrame">登录</a></div><?php endif; ?>

    </div>
	<div id="main_body">
	  <div id="main_body_inner">
	    <div id="inner_left">
		  <div id="left_content1">
		    <div id="left_content1_inner">
		    <?php if(empty($userinfo['nick_name'])): ?><div id="username">
			  	<?php echo ($userinfo["true_name"]); ?>
			  </div>
			  <?php else: ?>
			  <div id="username">
			  	<?php echo ($userinfo["nick_name"]); ?>
			  </div><?php endif; ?>
			  <a id="edit" href="#">
			  	编辑
			  </a>
			   <a id="touxiang" href="#">
			   	<img src="__Uploads__/Avatar/l_<?php echo ($userinfo["user_avatar_add"]); ?>">
			  </a>
			  <div id="personal_information">
			     <div id="name" class="information">
			    	姓名：<?php echo ($userinfo["true_name"]); ?>
				</div>
				<div id="school" class="information">
					学院：<?php echo ($userinfo["user_college"]); ?>
				</div>
				<div id="time" class="information">
					入学年份：
				</div>
				<div id="phone" class="information">
					手机：<?php echo ($userinfo["user_phone"]); ?>
				</div>
				<div id="qq" class="information">
					qq：<?php echo ($userinfo["user_qq"]); ?>
				</div>
				<div id="email" class="information">
					Email：<?php echo ($userinfo["user_mail"]); ?>
				</div>
				<div id="qianming" class="information">
					个人签名：
				</div>
			  </div>
			</div>
		  </div>
		  <div id="left_content2">
		    <div id="left_content2_inner">
			  <div id="top">
			    <div id="interest_title">
			    	猜你感兴趣...
			    </div>
			    <ul class="tabs">
	              <li><a href="#">活动</a></li><!--存放每个页面的名称-->
	              <li style="border:none"><a href="#">社团</a></li>
                </ul>
			  </div>
            <!-- tab "panes" -->
              <div class="panes">
	            <div>
				  <ul>
			        <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				    <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				    <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				    <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				    <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				    <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
				    <li><a href="#">哈哈哈哈哈哈哈哈哈哈哈哈</a></li>
			      </ul>
				</div><!--存放每个页面的内容-->
	            <div>
				  <ul>
			        <li><a href="#">反复反复反复反复反复反复</a></li>
				    <li><a href="#">反复反复反复反复反复反复</a></li>
				    <li><a href="#">反复反复反复反复反复反复</a></li>
				    <li><a href="#">反复反复反复反复反复反复</a></li>
				    <li><a href="#">反复反复反复反复反复反复</a></li>
				    <li><a href="#">反复反复反复反复反复反复</a></li>
				    <li><a href="#">反复反复反复反复反复反复</a></li>
			      </ul>
				</div><!--存放每个页面的内容-->
				  <a href="#" id="more3" class="more">
			      </a>
			      <a href="#" id="more4" class="more">
			      </a>
              </div>

			</div>
		  </div>
		</div>
		<div id="inner_right">
		  <div id="right_content">
		    <div id="top2">
			    <ul class="tabs2">
	              <li><a href="#">我关注的社团</a></li><!--存放每个页面的名称-->
	              <li><a href="#">活动</a></li>
				  <li style="border:none"><a href="#">留言</a></li>
                </ul>
			  </div>
            <!-- tab "panes" -->
              <div class="panes2">
	            <div>
	            <?php if(is_array($leagueinfo)): $i = 0; $__LIST__ = $leagueinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div id="remark<?php echo ($i+2); ?>" class="remark">
			        <div id="user_img<?php echo ($i+2); ?>" class="user_img">
			        	<img src="__Uploads__/Avatar/m_<?php echo ($vo["avater_address"]); ?>" alt="" />
				    </div>
				    <div id="remark_content<?php echo ($i+2); ?>" class="remark_content">
				      <div id="top<?php echo ($i+2); ?>" class="top">
				        <div id="username<?php echo ($i+2); ?>" class="username">
				        	<?php echo ($vo["league_name"]); ?>
					    </div>
				      </div>
				      <div id="middle<?php echo ($i+2); ?>" class="middle">
				        <?php echo ($vo["attentionnum"]); ?>个关注者
				      </div>
				      <div id="bottom<?php echo ($i+2); ?>" class="bottom">
					    <ul>
					    <?php if(is_array($lastactivity)): foreach($lastactivity as $key=>$va): if(($key) == $vo["id"]): if(is_array($va)): $i = 0; $__LIST__ = $va;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ve): $mod = ($i % 2 );++$i;?><li>
			              	 	<a href="#"><?php echo ($ve["activity_name"]); ?></a>
			              	 </li><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; ?> 
			            </ul>
				      </div>
				    </div>
			      </div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div><!--存放每个页面的内容-->
	            <div>
				  <?php if(is_array($activityinfo)): $i = 0; $__LIST__ = $activityinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vac): $mod = ($i % 2 );++$i; if(!empty($vac['id'])): ?><div id="activity<?php echo ($i+2); ?>" class="remark">
				    <div id="left<?php echo ($i+2); ?>" class="left">
			          <div id="club_img<?php echo ($i+2); ?>" class="user_img">
			          	<img src="__Uploads__/Avatar/m_<?php echo ($vac["leagueavatar"]); ?>">
				      </div>
					  <div id="clubname<?php echo ($i+2); ?>" class="clubname">
					  	<?php echo ($vac["activity_org_name"]); ?>
					  </div>
					</div>
				    <div id="activity_content<?php echo ($i+2); ?>" class="remark_content">
				      <div id="atop<?php echo ($i+2); ?>" class="top">
				        <div id="activityname<?php echo ($i+2); ?>" class="username">
				        	<?php echo ($vac["activity_name"]); ?>
					    </div>
				      </div>
				      <div id="amiddle<?php echo ($i+2); ?>" class="middle">
				        【<?php echo ($vac["activitystate"]); ?>】   <?php echo ($vac["attentionnum"]); ?>个关注者
				      </div>
				      <div id="abottom{i+2}" class="bottom">
					    <?php echo ($vac["activity_introduce"]); ?>
				      </div>
				    </div>
			      </div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				</div><!--存放每个页面的内容-->
				<div>
				  <div id="liuyan3" class="remark">
				    <div id="bleft3" class="left">
			          <div id="bclub_img3" class="user_img"><img src="../images/small.jpg" alt="" />
				      </div>
					  <div id="bclubname3" class="clubname">东南大学先声网
					  </div>
					</div>
				    <div id="liuyan_content3" class="remark_content">
				      <div id="btop3" class="top">
				        <div id="bactivityname3" class="username" style="float:left;color:#000;">
						  <div id="zai3" class="zai">在</div>
						  <a href="#" id="huodong3" class="huodong">先声之夜</a>
						  <div id="huifu3"class="huifu">回复你：</div>
					    </div>
				      </div>
				      <div id="bmiddle3" class="middle">
				        <p>活动详情活动详情活动详情活动详情活动详情活动详情活动详情活动详情活动详情活动详情活动详情活动详情活动详情</p>
				      </div>
					  <div id="remark_3" class="remark1">
			            <div id="user_img_3"><img src="../images/small.jpg" alt="" />
				        </div>
				        <div id="remark_content_3" class="remark_content1">
				          <div id="top_3" class="top1">
				            <div id="username_3" class="username1">赵亮
					        </div>
					        <div id="remark_time_3" class="remark_time"><pre>2012-12-22  12:12:12</pre>
					        </div>
				          </div>
				          <div id="middle_3" class="middle1">
				            <p>本站通过聚合各团体组织信息、活动信息，
				               形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
				               同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
				            </p>
				          </div>
				          <div id="bottom_3" class="bottom1">
				            <a href="#" class="btn_replay_3" >回复</a>
				          </div>
				        </div>
			          </div>
				      <div id="bbottom3" class="bottom">
					    <input type="text" value="回复..." style="color:#999;"onfocus="this.style.color='#000000';if(this.value=='回复...'){this.value=''}" onblur="this.style.color='#999';if(this.value==''){this.value='回复...'}"/>
				      </div>
					  <div id="replay_bottom3" class="replay_bottom">
				        <a href="#" id="submit">回应
				        </a>
				        <a href="#" id="aite">@某人
				        </a>
				      </div>
				    </div>
			      </div>
				</div><!--存放每个页面的内容-->
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
<a id="toTop" href="#" style="display:none;width:72px;height:74px;" title="返回顶部"></a>
<script>
// perform JavaScript after the document is scriptable.
$(function() {
    // setup ul.tabs to work as tabs for each div directly under div.panes
    $("ul.tabs").tabs("div.panes > div");
});
</script>
<script type="text/javascript">
// perform JavaScript after the document is scriptable.
	    $(function() {
		for(var i=3;i<10;i++){
        // setup ul.tabs to work as tabs for each div directly under div.panes
		$("ul.tabs2").tabs("#bottom"+i);
	    $("ul.tabs2").tabs("#middle"+i);
	    $("ul.tabs2").tabs("#username"+i);
	    $("ul.tabs2").tabs("#top"+i);
	    $("ul.tabs2").tabs("#remark_content"+i);
	    $("ul.tabs2").tabs("#user_img"+i);
        $("ul.tabs2").tabs("#remark"+i);
	    $("ul.tabs2").tabs("div.panes2 > div");
		}
    });
	 $(function() {
		for(var i=3;i<10;i++){
        // setup ul.tabs to work as tabs for each div directly under div.panes
		$("ul.tabs2").tabs("#abottom"+i);
	    $("ul.tabs2").tabs("#amiddle"+i);
	    $("ul.tabs2").tabs("#activityname"+i);
	    $("ul.tabs2").tabs("#atop"+i);
	    $("ul.tabs2").tabs("#activity_content"+i);
		$("ul.tabs2").tabs("#clubname"+i);
	    $("ul.tabs2").tabs("#club_img"+i);
		$("ul.tabs2").tabs("#left"+i);
        $("ul.tabs2").tabs("#activity"+i);
	    $("ul.tabs2").tabs("div.panes2 > div");
		}
    });
		 $(function() {
		for(var i=3;i<10;i++){
        // setup ul.tabs to work as tabs for each div directly under div.panes
		$("ul.tabs2").tabs("#replay_bottom"+i);
		$("ul.tabs2").tabs("#bottom_"+i);
	    $("ul.tabs2").tabs("#middle_"+i);
	    $("ul.tabs2").tabs("#username_"+i);
	    $("ul.tabs2").tabs("#top_"+i);
		$("ul.tabs2").tabs("#remark_time_"+i);
	    $("ul.tabs2").tabs("#remark_content_"+i);
	    $("ul.tabs2").tabs("#user_img_"+i);
        $("ul.tabs2").tabs("#remark_"+i);
		$("ul.tabs2").tabs("#bbottom"+i);
	    $("ul.tabs2").tabs("#bmiddle"+i);
	    $("ul.tabs2").tabs("#bactivityname"+i);
	    $("ul.tabs2").tabs("#btop"+i);
	    $("ul.tabs2").tabs("#liuyan_content"+i);
		$("ul.tabs2").tabs("#huifu"+i);
		$("ul.tabs2").tabs("#huodong"+i);
		$("ul.tabs2").tabs("#zai"+i);
		$("ul.tabs2").tabs("#bclubname"+i);
	    $("ul.tabs2").tabs("#bclub_img"+i);
		$("ul.tabs2").tabs("#bleft"+i);
        $("ul.tabs2").tabs("#liuyan"+i);
	    $("ul.tabs2").tabs("div.panes2 > div");
		}
    });
</script>
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
</body>
</html>