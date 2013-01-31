<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>档案室</title>
<link href="__Public__/Css/danganshi.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../css/header.css" />
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
	<div id="main_body">
	  <div id="top">
	    <div id="touxiang">
	    	<img src="__Uploads__/LeagueAvatar/l_<?php echo ($league[0]['avater_address']); ?>" />
		</div>
		<div id="title"><?php echo ($league[0]['league_name']); ?>
		</div>
		<a href="#"id="attention">
		  <div id="attention_img">
		  </div>
		  <div id="attention_text">关注
		  </div>			  
		</a>
		<div id="member">
		  <div id="member_title">社团成员：
		  </div>
		  <div id="member_text">
		    <p>
		    	<?php echo ($league[0]['league_member']); ?>  
		    </p>
		  </div>
		</div>
	  </div>
	  <div id="middle">
	    <div id="club">
		  <div id="club_title">社团简介：
		  </div>
		  <div id="club_text">
		    <p>
		    	<?php echo ($league[0]['league_introduce']); ?>
		    </p>
		  </div>
		</div>
	  </div>
	   <div id="bottom">
	    <div id="contact">
		  <div id="contact_title">联系我们：
		  </div>
		  <div id="contact_text">
	    	<?php echo ($league[0]['contact']); ?>
		  </div>
		</div>
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