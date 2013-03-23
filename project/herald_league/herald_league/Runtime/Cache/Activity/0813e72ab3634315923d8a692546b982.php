<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($activityInf["activity_name"]); ?>--活动详情--东南大学先声网</title>
<link rel="shortcut icon" href="__ROOT__/Public/Images/favicon.ico"/>
<link href="__ROOT__/Public/Css/activity.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/footer.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Css/header.css" />
<script type="text/javascript" src="__ROOT__/Public/js/jquery.min.js"></script> 
<script language="javascript" src="__ROOT__/Public/Js/login/GreyFrame.js" ></script>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.masonry.min.js"></script>
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
				frameMatch = new GreyFrame("MyGreyFrame", 500, 300);
				frameContect = new GreyFrame("ContactFrame", 350, 120);
</script>
<script type="text/javascript">

		function changeAttention(id,act)
		{
				$.getJSON("<?php echo U('Activity/Activity/changeAttention');?>",{activityid:id,action:act},function(data,status){
						if(data.status !=1) //操作失败了
						{
								alert(data.info);
						}
						else
						{
								$("#attended").toggle();
								$("#notattended").toggle();
								if($("#touxiang<?php echo ($uid); ?>").length>0)//已经存在
								{
										$("#touxiang<?php echo ($uid); ?>").toggle();
								}
								else
								{
										$("#touxiang").append("<a id=\"touxiang<?php echo ($uid); ?>\"></a>");
										$("#touxiang<?php echo ($uid); ?>").attr({
												"class":"tx",
												"href":"#"
										});
										$("#touxiang<?php echo ($uid); ?>").html("<div id=\"touxiang_img1 \" class=\"touxiang_img\"><img width=\"50px\" height=\"50px\" alt=\"\" src=\"__ROOT__/Uploads/UserAvatar/<?php echo ($uid); ?>.jpg\" ></div><div id=\"touxiang_text1\" class=\"touxiang_text\"><?php echo ($userName); ?></div>");
										$("#touxiang<?php echo ($uid); ?>").show();
								}

						}
				});
		}
		<?php if(!empty($isvote)): ?>function vote(voteItemId)
		{
								$.getJSON("<?php echo U('/Activity/Vote/vote/');?>",{itemid:voteItemId},function(data,status){
										if(data.status==1)//成功
										{
												$("#vote"+voteItemId).html(data.info);
												var old=$("#count"+voteItemId).html();
												$("#count"+voteItemId).text(parseInt(old)+1);
										}
										else
										{
												alert(data.info);
										}
								});
		}<?php endif; ?>

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
<style type="text/css">
<!--
.layout{float:left;}
.box{background:#ebf3f7;padding:6px;float:left;}
.input-button{background:#46c9c7;border-color:#B8D4E8 #124680 #124680 #B8D4E8;border-style:solid;border-width:1px;color:#fff;cursor:pointer;
font-size:12px;width:60px;padding:2px 15px;text-align:center;line-height:16px;}
textarea{width:432px;height:22px;border:1px solid #bdc7d8;background:#fff;line-height:20px;padding:0 2px;font-size:14px;word-wrap:break-word;}
.focus{border:1px solid #5D74A2;height:38px;overflow:hidden;overflow-y:auto;}
p{display:none;padding-top:3px;}
p input{float:left;}
p span{float:left;color:#ccc;font-size:12px;line-height:25px;padding-left:5px;}
-->
</style>
<script type="text/javascript">
$(function(){
				function maxLimit(){
								var num=$(this).val().substr(0,140);
								$(this).val(num);
								$(this).next().children("span").text($(this).val().length+"/140");
				};
				$(".textlimit").keyup(maxLimit);
				$(".textlimit").focus(function(){
								$(this).addClass("focus").next().show();
								if($(this).val() == $(this).attr("title")){
												$(this).val("");
								}
				});
		 $(".btn_replay_3").click(function(){
								$("#textlimit1").addClass("focus").next().show();
								if($("#textlimit1").val() == $(".textlimit1").attr("title")){
												$("#textlimit1").val("");
								}
				});
				$(".textlimit").blur(function(){
								if($(this).val().length > 0){
												$(this).addClass("focus").next().show();
								}else{
												$(this).removeClass("focus").next().hide();
								}
								if($(this).val() == ""){
												$(this).val($(this).attr("title"));
								}
				});
		
});
</script>
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
			
			<div id="user"><a href="#"><?php echo ($userName); ?></a></div>
			<div id="exit"><a href="javascript:;"  onclick="logout()">退出</a></div>
		<?php else: ?>
			<div id="user"><a href="<?php echo U('/User/Login/');?>" target="MyGreyFrame">登录</a></div><?php endif; ?>

		</div>
		<div id="main_body">
			<div id="main_body_inner">
				<div id="inner_left">
					<div id="left_content">
						<div id="left1">
							<div id="title"><?php echo ($activityInf["activity_name"]); ?></div>
							<a href="javascript:;" onclick="javascript:changeAttention(<?php echo ($activityInf["id"]); ?>,'add')" id="notattended" class="attention" <?php if($isattended == 1): ?>style="display:none"<?php endif; ?>> 
								<div id="attention_img">
								</div>
								<div id="attention_text">关注
								</div>              
							</a>
							<a href="javascript:;" onclick="javascript:changeAttention(<?php echo ($activityInf["id"]); ?>,'del')" class="attention" id="attended" <?php if($isattended == 0 ): ?>style="display:none"<?php endif; ?>>
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
								<div id="time_text">时间：<?php echo ($activityInf["start_time"]); ?>---<?php echo ($activityInf["end_time"]); ?>
										<?php if(empty($isstart)): ?>【未开始】
										<?php else: ?>
										<?php if(empty($isend)): ?>【进行中】
										<?php else: ?>
												【已结束】<?php endif; endif; ?>
										<?php if($activityInf["specific_time"] != null): ?><div style="margin-left: 38px">(<?php echo ($activityInf["specific_time"]); ?>)</div><?php endif; ?>
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
								<?php echo (htmldecode($activityInf["activity_introduce"])); ?>
							</div>
							<div id="activity_img"><img width=500px  src="__ROOT__/Uploads/LeaguePost/Large/<?php echo (($activityInf["activity_post_add"])?($activityInf["activity_post_add"]):"default.jpg"); ?>"/>
							</div>
							<?php if(!empty($isvote)): ?><div>
									<?php if(is_array($voteResult)): $i = 0; $__LIST__ = $voteResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div><?php echo ($v["item"]); ?>:<a id="count<?php echo ($v["id"]); ?>"><?php echo ($v["count"]); ?></a>
													<?php if($v["isvoted"] == 1): ?><a>已经投过了</a>
													<?php else: ?>
															<a id="vote<?php echo ($v["id"]); ?>" onclick="javascript:vote(<?php echo ($v["id"]); ?>)">投他一票</a><?php endif; ?>
											</div><?php endforeach; endif; else: echo "" ;endif; ?>
									</div><?php endif; ?>
							<div id="share">
								 <div id="share_text">分享至
								 </div>
							</div>
						</div>
						<div id="left4">
							<div id="remark">
					<div id="user_img"><img src="../images/small.jpg" alt="" />
								</div>
								<div id="remark_content">
									<div id="top">
										<div id="username">赵亮
										</div>
										<div id="remark_time"><pre>2012-12-22  12:12:12</pre>
										</div>
									</div>
									<div id="middle">
						<p style="display:block;">本站通过聚合各团体组织信息、活动信息，
							 形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
							 同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
						</p>
					 <div class="layout">
										<div class="box">
										<textarea name="textarea" class="textlimit" cols="45" rows="1" placeholder="添加回复"></textarea>
										<p>
												<input class="input-button" type="button" value="回复" />
												<span class="textCount">0/140</span>
										</p>
										</div>
										</div>
					</div>
				</div>
				</div>
				 <div id="remark">
					<div id="user_img"><img src="../images/small.jpg" alt="" />
				</div>
				<div id="remark_content">
					<div id="top">
						<div id="username">赵亮
					</div>
					<div id="remark_time"><pre>2012-12-22  12:12:12</pre>
					</div>
					</div>
					<div id="middle">
						<p style="display:block;">本站通过聚合各团体组织信息、活动信息，
							 形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
							 同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
						</p>
					 <div class="layout">
										<div class="box">
										<textarea name="textarea" class="textlimit" cols="45" rows="1" placeholder="添加回复"></textarea>
										<p>
												<input class="input-button" type="button" value="回复" />
												<span class="textCount">0/140</span>
										</p>
									</div>
										</div>
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
						<p style="display:block;">本站通过聚合各团体组织信息、活动信息，
											 形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
											 同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
										</p>
									</div>
					 <div id="remark_3" class="remark1">
								<div id="user_img_3" class="user_img"><img src="../images/small.jpg" alt="" />
							</div>
							<div id="remark_content_3" class="remark_content1">
								<div id="top_3" class="top1">
									<div id="username_3" class="username1">赵亮
								</div>
								<div id="remark_time_3" class="remark_time"><pre>2012-12-22  12:12:12</pre>
								</div>
								</div>
								<div id="middle_3" class="middle1">
									<p style="display:block;">本站通过聚合各团体组织信息、活动信息，
										 形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
										 同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
									</p>
								</div>
								<div id="bottom_3" class="bottom1">
									<button class="btn_replay_3">回复</button>
								</div>
							</div>
								</div>
					<div class="layout">
										<div class="box">
										<textarea  id="textlimit1" name="textarea" class="textlimit" cols="45" rows="1" placeholder="添加回复"></textarea>
										<p>
												<input class="input-button" type="button" value="回复" />
												<span class="textCount">0/140</span>
										</p>
										</div>
										</div>
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
								<?php if(is_array($attender)): $i = 0; $__LIST__ = array_slice($attender,0,12,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><a  href="#"id="touxiang<?php echo (($a["id"])?($a["id"]):0); ?>" class="tx">
										<div id="touxiang_img1" class="touxiang_img"><img width=50px height=50px src="__ROOT__/Uploads/UserAvatar/<?php echo (($a["user_avatar_add"])?($a["user_avatar_add"]):"default.jpg"); ?>" alt="" />
										</div>
										<div id="touxiang_text1" class="touxiang_text"><?php echo (($a["true_name"])?($a["true_name"]):匿名); ?>
										</div>
									</a><?php endforeach; endif; else: echo "" ;endif; ?>
							<?php if(count($attender) > 11): ?>...<?php endif; ?>	
						</div>
						<div id="right3">
							<div id="interest_title">猜你感兴趣...
							</div>
						</div>
						<div id="right4">
							<ul>
								
								<?php if(is_array($intrest)): foreach($intrest as $key=>$r): ?><li><a href="<?php echo U('/Activity/Activity/detail/activityid/');?>/<?php echo ($r["id"]); ?>"><?php echo ($r["activity_name"]); ?></a></li><?php endforeach; endif; ?>
							</ul>
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
<body>
</html>