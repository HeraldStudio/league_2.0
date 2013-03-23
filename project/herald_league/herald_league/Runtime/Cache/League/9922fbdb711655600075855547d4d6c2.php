<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
<link href="__Public__/Css/liuyanban.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="__Public__/Css/colorbox.css" />
<script src="__Public__/Js/jquery.min.js"></script>
<script src="__Public__/Js/jquery.colorbox.js"></script>
<script>
	$(document).ready(function(){
		$(".iframe").colorbox({iframe:true, width:"80%", height:"90%"});
	});
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
	opacity:0.7;
}
</style>
</head>
<body>
  <div id="main">
	<div id="main_body">
		<!--显示社团空间流言信息-->
	<?php if(is_array($commed)): $i = 0; $__LIST__ = $commed;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><div class="liuyan">
	    <div class="top">
	      <div class="club_touxiang">
	      	<img src="__Uploads__/Avatar/s_<?php echo (getcommenteravatar($vc['comming_id']*10+$vc['comming_type'])); ?>" />
		  </div>
		  <div class="club_name">
		  	<?php echo (getcommentername($vc['comming_id']*10+$vc['comming_type'])); ?>&nbsp<span style = "color:red;">给我留言：</span>
		  </div>
		  <a class='iframe' href="__URL__/answer/commentid/<?php echo ($vc["id"]); ?>/type/comming">
		    <div class="liuyan_img">
			</div>
			<div class="liuyan_num">2
			</div>
		  </a>
		  <div class="time">
		  	<?php echo ($vc["comment_date"]); ?> <?php echo ($vc["comment_time"]); ?>
		  </div>
		</div>
		<div class="bottom">
		  <div class="liuyan_content">
		  <?php if(strlen($vc['content']) < 102): ?><p>
		  		<?php echo ($vc['content']); ?>
		  	</p>
		  	<?php else: ?>
		  	<p>
		  		<?php echo substr($vc['content'],0,102)?>......
		  	</p><?php endif; ?>
		  </div>
		</div>
	  </div><?php endforeach; endif; else: echo "" ;endif; ?>
	<!--显示社团空间回复信息-->
	<?php if(is_array($commentinleagueanduserzone)): $i = 0; $__LIST__ = $commentinleagueanduserzone;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><div class="liuyan">
	    <div class="top">
	      <div class="club_touxiang">
	      	<img src="__Uploads__/Avatar/s_<?php echo (getcommenteravatar($vc['comming_id']*10+$vc['comming_type'])); ?>" />
		  </div>
		  <div class="club_name">
		  	<?php echo (getcommentername($vc['commed_id']*10+$vc['commed_type'])); ?>&nbsp<span style = "color:red;">回复了我：</span>
		  </div>
		  <a class='iframe' href="__URL__/answer/commentid/<?php echo ($vc["id"]); ?>/type/commed">
		    <div class="liuyan_img">
			</div>
			<div class="liuyan_num">2
			</div>
		  </a>
		  <div class="time">
		  	<?php echo ($vc["comment_date"]); ?> <?php echo ($vc["comment_time"]); ?>
		  </div>
		</div>
		<div class="bottom">
		  <div class="liuyan_content">
		  <?php if(strlen($vc['content']) < 102): ?><p>
		  		<?php echo ($vc['content']); ?>
		  	</p>
		  	<?php else: ?>
		  	<p>
		  		<?php echo substr($vc['content'],0,102)?>......
		  	</p><?php endif; ?>
		  </div>
		</div>
	  </div><?php endforeach; endif; else: echo "" ;endif; ?>
	<!--显示照片评论信-->
	<?php if(is_array($commentinpicture)): $i = 0; $__LIST__ = $commentinpicture;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vp): $mod = ($i % 2 );++$i;?><div class="liuyan">
	    <div class="top">
	      <div class="club_touxiang">
	      	<img src="__Uploads__/Avatar/s_<?php echo (getcommenteravatar($vp['commed_id']*10+$vp['commed_type'])); ?>" />
		  </div>
		  <div class="club_name">
		  	<?php echo (getcommentername($vp['commed_id']*10+$vp['commed_type'])); ?>&nbsp
		  	在照片&nbsp<span style = "color:red;"><?php echo (getleaguepicturename($vp['commed_id'])); ?></span>&nbsp中回复我：
		  </div>
		  <a class='iframe' href="__URL__/answer/commentid/<?php echo ($vp["id"]); ?>/type/commed">
		    <div class="liuyan_img">
			</div>
			<div class="liuyan_num">2
			</div>
		  </a>
		  <div class="time">
		  	<?php echo ($vp["comment_date"]); ?> <?php echo ($vp["comment_time"]); ?>
		  </div>
		</div>
		<div class="bottom">
		  <div class="liuyan_content">
		  <?php if(strlen($vp['content']) < 186): ?><p>
		  		<?php echo ($vp['content']); ?>
		  	</p>
		  	<?php else: ?>
		  	<p>
		  		<?php echo substr($vp['content'],0,186)?>......
		  	</p><?php endif; ?>
		  </div>
		</div>
	  </div><?php endforeach; endif; else: echo "" ;endif; ?>
	<!--显示在活动中的评论信息-->
	<?php if(is_array($commentinactivity)): $i = 0; $__LIST__ = $commentinactivity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><div class="liuyan">
	    <div class="top">
	      <div class="club_touxiang">
	      	<img src="__Uploads__/Avatar/s_<?php echo (getcommenteravatar($vc['commed_id']*10+$vc['commed_type'])); ?>" />
		  </div>
		  <div class="club_name">
		  	<?php echo (getcommentername($vc['commed_id']*10+$vc['commed_type'])); ?>&nbsp
		  	在活动&nbsp<span style = "color:red;"><?php echo (getleagueactivityname($vc['commed_id'])); ?></span>&nbsp中回复我：
		  </div>
		  <a class='iframe' href="__URL__/answer/commentid/<?php echo ($vc["id"]); ?>">
		    <div class="liuyan_img">
			</div>
			<div class="liuyan_num">2
			</div>
		  </a>
		  <div class="time">
		  	<?php echo ($vc["comment_date"]); ?> <?php echo ($vc["comment_time"]); ?>
		  </div>
		</div>
		<div class="bottom">
		  <div class="liuyan_content">
		  <?php if(strlen($vc['content']) < 186): ?><p>
		  		<?php echo ($vc['content']); ?>
		  	</p>
		  	<?php else: ?>
		  	<p>
		  		<?php echo substr($vc['content'],0,186)?>......
		  	</p><?php endif; ?>
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