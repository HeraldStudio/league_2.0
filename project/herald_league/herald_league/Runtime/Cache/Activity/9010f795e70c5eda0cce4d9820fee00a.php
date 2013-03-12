<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动信息平台首页</title>
<link href="__ROOT__/Public/Css/index.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/footer.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Css/wowslider-container1.css" />
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.masonry.min.js"></script>
<script tupe="text/javascript" src="__ROOT__/Public/Js/login/GreyFrame.js" ></script>
<script type="text/javascript" >
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
				frameMatch = new GreyFrame("MyGreyFrame", 500, 300);
				frameContect = new GreyFrame("ContactFrame", 350, 120);
</script>
<script type="text/javascript">

	function changeAttention(activityid,action,key)
	{
		$.getJSON("<?php echo U('Activity/Activity/changeAttention');?>",{"activityid":activityid,"action":action},function(data,status){
			if(data.status!=1) //失败了
				alert(data.info);
			else
			{
				$("#attention"+key+"_isattended").toggle();
				$("#attention"+key+"_notattended").toggle();
			}
		});
	};

</script>
<script type="text/javascript">
		function getMore()
		{
				if(typeof getMore.count == 'undefined')
						getMore.count=10;
				getMore.uid = <?php echo ($uid); ?>;
				getMore.count+=10;
				$.getJSON("<?php echo U('/Activity/Index/GetMore/');?>",{"count":getMore.count,"uid":getMore.uid},function(data){
						if (data == "") {
								$("#btn_all").text("没有更多了");
								if(typeof getMore.nomore =="undefined")
										getMore.nomore = 1;
								else
										$("#btn_all").fadeOut(1000);
						} else {
								$.each(data, function (key, val) {
										$("#list").append(val)
								})
								$("#list").masonry('reload');
						}

				})
		}
</script>

<style type="text/css">
a:link {
		color: #cccccc;;
		font-weight: bold;
}
a:visited {
		color: #cccccc;
		font-weight: bold;
}
a:hover {
		color: #34c5c3;
		font-weight: bold;
}
</style>
</head>
<body>
	<div id="main">
		<div id="header">
			<div id="header_top">
					<div id="islogin" <?php if($islogin == 0): ?>style="display:none"<?php endif; ?> >
							<div id="header_top_text">
								<a href="javascript:;"  onclick="logout()"  id="header_top_text">退出</a>
								<a href="#" id="header_top_text"><?php echo ($name); ?></a>
							</div>
							<div id="tubiao">
								<a href="#" id="xinxi"></a>
								<a href="__APP__" id="shouye"></a>
							</div>
					</div>
					<div id="notlogin" <?php if($islogin == 1): ?>style="display:none"<?php endif; ?> >
							<div id="header_top_text">
								<a href="<?php echo U('/User/Login/');?>" target="MyGreyFrame" id="login">登录</a>
							</div>
							<div id="tubiao">
								<a href="__APP__" id="shouye"></a>
							</div>
					</div>   
			</div>
			<div id="header_bottom">
				<div id="logo">
				</div>
				<div id="navigation">
					<div id="herald" class="navigation_link">
						<a href="http://herald.seu.edu.cn" >先声首页</a>
					</div>
					 <div id="map" class="navigation_link">
						<a href="#" >社团地图</a>
					</div>
					 <div id="activity" class="navigation_link">
						<a href="#" >活动信息</a>
					</div>
					 <div id="wall" class="navigation_link">
						<a href="<?php echo U('Activity/Activity/wall');?>" >海报墙</a>
					</div>
				</div>
			</div>
		</div>
		<div id="main_body">
			<div id="main_body_top">
				<div id="wowslider-container1">
					<div class="ws_images">
						<ul>
								<?php if(is_array($recent)): foreach($recent as $key=>$r): ?><li>
										<a href="<?php echo U('Activity/Activity/detail/');?>/activityid/<?php echo ($r["id"]); ?>" target="_blank"><img  width=600px height=300px src="__ROOT__/Uploads/LeaguePost/Large/<?php echo (($r["activity_post_add"])?($r["activity_post_add"]):"default.jpg"); ?>" alt="<?php echo ($r["activity_name"]); ?>" title="<?php echo ($r["activity_org_name"]); ?>" id="wows1_0"/></a>
										<h1 class="title"><?php echo ($r["activity_name"]); ?></h1>
										<p>
												<?php if($r["isstart"] > 0): ?>未开始
												<?php else: ?>
														<?php if($r["isend"] > 0): ?>进行中
														<?php else: ?>
																已结束<?php endif; endif; ?>
										</p>
										<p>时间:<?php echo ($r["start_time"]); ?>---<?php echo ($r["end_time"]); ?></p>
										<p>地点：<?php echo (($r["activity_place"])?($r["activity_place"]):""); ?></p>
										<p>联系方式:<?php echo ($r["contact_info"]); ?></p>
										<p>主办方:<?php echo ($r["activity_org_name"]); ?></p>
										</li><?php endforeach; endif; ?>
						</ul>
					</div>
					<div class="ws_bullets">
						<div>
							<?php if(is_array($recent)): foreach($recent as $key=>$r): ?><a href="#" title="<?php echo ($r["activity_name"]); ?>"><img width=96px height=48px src="__ROOT__/Uploads/LeaguePost/Small/<?php echo ($r["activity_post_add"]); ?>" alt="<?php echo ($r["activity_name"]); ?>"/>
										<?php echo ($key+1); ?></a><?php endforeach; endif; ?>
						</div>
					</div>
					<div class="ws_shadow"></div>     
				</div>
			</div>
			<div id="main_body_bottom">
				<div id="main_body_bottom_left">
					<ul class="list" id="list">
						<?php if(is_array($activities)): $i = 0; $__LIST__ = $activities;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><li>
							<a target="_blank" href="<?php echo U('Activity/Activity/detail/');?>/activityid/<?php echo ($a["id"]); ?>"><img width=190px src="__ROOT__/Uploads/LeaguePost/Fall/<?php echo ($a["activity_post_add"]); ?>" alt="" /></a>
							<a target="_blank" href="<?php echo U('Activity/Activity/detail/');?>/activityid/<?php echo ($a["id"]); ?>"><div class="activity_title"><?php echo ($a["activity_name"]); ?></div></a>
							
								<a href="javascript:void(0)" onclick="javascript:changeAttention(<?php echo ($a["id"]); ?>,'del',<?php echo ($key); ?>)" class="attention" id="attention<?php echo ($key); ?>_isattended" <?php if($a["isattended"] == 0): ?>style="display:none"<?php endif; ?>>
									<div class="attention_text" id="attention_text">取消关注
									</div>            
								</a>
							
								<a href="javascript:void(0)" onclick="javascript:changeAttention(<?php echo ($a["id"]); ?>,'add',<?php echo ($key); ?>)" class="attention" id="attention<?php echo ($key); ?>_notattended" <?php if($a["isattended"] == 1): ?>style="display:none"<?php endif; ?>>
								 <div class="attention_img" id="attention_img">
								 </div>
								 <div class="attention_text" id="attention_text">关注
								 </div>            
								</a>
							
						</li><?php endforeach; endif; else: echo "" ;endif; ?>          
					</ul>
					<div id="all">
						<a href="javascript:;" id="btn_all" onclick="javascript:getMore()">点击查看更多</a>
					</div>
				</div>
				<div id="main_body_bottom_right">
					<div id="right_inner">
						<div id="search">
							<form onsubmit="checkInput('searchkey','关键字','请输入关键字')">
								<input type="text" value="请输入关键字" style="color:#999;"onfocus="this.style.color='#000000';if(this.value=='请输入关键字'){this.value=''}" onblur="this.style.color='#999';if(this.value==''){this.value='请输入关键字'}"/>
							</form>
							<a href="#" id="search_image">
							</a>
						</div>
						<div id="hot_biaoqian" class="hot">
							<div id="hot_biaoqian_title" class="hot_title">
								<div id="hot_img" class="hot_img">
								</div>
								<div id="hot_text" class="hot_text">热门标签
								</div>
							</div>
							<div id="biaoqian_content" class="content">
								<a id="biaoqian3" class="bq" href="#">全部活动</a>
								<?php if(is_array($heatClass)): $i = 0; $__LIST__ = $heatClass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$h): $mod = ($i % 2 );++$i;?><a href="#">
									<div id="biaoqian1" class = "bq"><?php echo ($h["class_name"]); ?></div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
						<div id="hot_activity" class="hot">
							<div id="hot_activity_title" class="hot_title">
								<div id="hot_img" class="hot_img">
								</div>
								<div id="hot_text" class="hot_text">热门活动
								</div>
							</div>
							<div id="activity_content" class="content">
								<?php if(is_array($heatActivity)): $i = 0; $__LIST__ = $heatActivity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$h): $mod = ($i % 2 );++$i;?><a href="<?php echo U('Activity/Activity/detail/');?>/activityid/<?php echo ($h["id"]); ?>"><div id="activity_content_text" class = "content_text"><?php echo ($h["activity_name"]); ?>
									</div></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
							<div class="more">
								 <a href="#" class="more_text">More...
								 </a>
							</div>
						</div>
						<div id="hot_club" class="hot">
							<div id="hot_club_title" class="hot_title">
								<div id="hot_img" class="hot_img">
								</div>
								<div id="hot_text" class="hot_text">热门社团
								</div>
							</div>
							<div id="club_content" class="content">
								<?php if(is_array($heatLeague)): $i = 0; $__LIST__ = $heatLeague;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$h): $mod = ($i % 2 );++$i;?><a href="#">
									<div id="club_content_text" class = "content_text"><?php echo ($h["league_name"]); ?>
									</div></a><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
							<div class="more">
								 <a href="#" class="more_text">More...
								 </a>
							</div>
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
<script type="text/javascript" src="__ROOT__/Public/Js/engine1/wowslider.js"></script>
<script type="text/javascript" src="__ROOT__/Public/Js/engine1/script.js"></script>
<script type="text/javascript">
						$(document).ready(function(){
								//To switch directions up/down and left/right just place a "-" in front of the top/left attribute
								//Vertical Sliding
								$('.boxgrid.slidedown').hover(function(){
										$(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
								}, function() {
										$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
								});
								//Horizontal Sliding
								$('.boxgrid.slideright').hover(function(){
										$(".cover", this).stop().animate({left:'205px'},{queue:false,duration:300});
								}, function() {
										$(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
								});
								//Diagnal Sliding
								$('.boxgrid.thecombo').hover(function(){
										$(".cover", this).stop().animate({top:'260px', left:'325px'},{queue:false,duration:300});
								}, function() {
										$(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
								});
								//Partial Sliding (Only show some of background)
								$('.boxgrid.peek').hover(function(){
										$(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
								}, function() {
										$(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
								});
								//Full Caption Sliding (Hidden to Visible)
								$('.boxgrid.captionfull').hover(function(){
										$(".cover", this).stop().animate({top:'200px'},{queue:false,duration:160});
								}, function() {
										$(".cover", this).stop().animate({top:'300px'},{queue:false,duration:160});
								});
								//Caption Sliding (Partially Hidden to Visible)
								$('.boxgrid.caption').hover(function(){
										$(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
								}, function() {
										$(".cover", this).stop().animate({top:'220px'},{queue:false,duration:160});
								});
						});
				</script>
<script>
var $list= $(".list");
$list.imagesLoaded(function(){
	$list.masonry({
		itemSelector : ".list li",
		columnWidth : 225
	});
});
</script>
</body>
</html>