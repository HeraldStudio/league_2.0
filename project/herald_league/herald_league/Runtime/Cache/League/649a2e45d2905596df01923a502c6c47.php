<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
<link rel="stylesheet" type="text/css" href="__Public__/Css/club.css" />
<link rel="stylesheet" type="text/css" href="__Public__/Css/liuyanban2.css"/>
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
	  <div id="message">
	    <a href="#" id="message_image"></a>
	  </div>
	  <div id="love">
	    <a href="#" id="love_image"></a>
	  </div>
	  <div id="user"><a href="#">赵亮</a></div>
	  <div id="exit"><a href="#">退出</a></div>
	</div>
	<div id="main_body">
	  <div id="main_body_inner">
	    <div id="danganshi">
		  <iframe name="i" src="__APP__/League/Home/communion/leagueid/<?php echo ($leagueid); ?>" ></iframe>
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
	  <div id="touxiang2"><img src="../images/herald.jpg" />
	  </div>
	  <div id="name">先声网
	  </div>
	  <div id="address">地址
	  </div>
	</div>
	<div id="lable_bottom">
	  <div id="guanzhu">关注
	  </div>
	  <div id="number">16人关注
	  </div>
	  <a href="#" id="chumen">
	    <div id="chumen_img">
		</div>
		<div id="chumen_text">出门
		</div>
	   </a>
	</div>
  </div>
  <div id="door">
  </div>
  <div id="wall3">
  </div>
  <div id="danganshi_biaoti">留言板
  </div>
  <a id="arrow" href="__APP__/League/Home/clubIndex/leagueid/<?php echo ($leagueid); ?>" title="返回大厅">
  </a>
</body>
</html>