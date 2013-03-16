<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
<link href="__Public__/Css/yingxiangguan.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/totop.css" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
	color: #fff;
}
a:visited {
	color: #fff;
}
a:hover {
	color: #34c5c3;
	opacity:0.7;
}
</style>
</head>
<body>
  <div id="main">
	<div id="main_body">
	<?php if(is_array($album)): $i = 0; $__LIST__ = $album;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="photo">
	    <div class="photo_img">
	    	<a href = "__APP__/League/Home/club/title/zpq/leagueid/<?php echo ($leagueid); ?>/albumid/<?php echo ($vo["id"]); ?>" target = "blank">
				<img src = "__Uploads__/<?php echo ($vo["album_cover_add"]); ?>"/>
			</a>
		</div>
		<div class="photo_text">
		  <div class="photo_name">
		  	<a href = "__APP__/League/Home/club/title/zpq/leagueid/<?php echo ($leagueid); ?>/albumid/<?php echo ($vo["id"]); ?>" target = "blank">
		  		<?php echo ($vo["album_name"]); ?>
			</a>
		  </div>
		  <div class="photo_num">2张
		  </div>
		</div>
	  </div><?php endforeach; endif; else: echo "" ;endif; ?>
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