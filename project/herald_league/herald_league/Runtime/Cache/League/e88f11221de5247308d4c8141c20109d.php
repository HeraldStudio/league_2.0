<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详情</title>
<link href="__Public__/Css/dating.css" rel="stylesheet" type="text/css" />
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
	    <div id="inner_left">
		  <div id="left_content">
            <div id="left1">
		      <div id="title"><?php echo ($activity['activity_name']); ?></div>
			  <a href="#"id="attention">
			    <div id="attention_img">
			    </div>
			    <div id="attention_text">
			    	关注
			    </div>			  
			  </a>
			  <div id="shuoming">
			    <div id="biaoqian">
				  	<?php if($class == null): ?><div id="biaoqian1" class="bq">没有标签</div>
				    <?php else: ?>
					  <?php if(is_array($class)): foreach($class as $key=>$c): ?><div id="biaoqian1" class="bq"><?php echo ($c); ?></div><?php endforeach; endif; endif; ?>
				</div>
				<div id="redu">热度：<?php echo ($activity['activity_count']); ?>
				</div>
				<a href="#" id="pinglun">5条评论
				</a>
			  </div>
		    </div>
			<div id="left2">
			  <div id="time" class="information">
                <div id="time_img">
				</div>
				<div id="time_text">时间:<?php echo ($activity['start_time']); ?>---<?php echo ($activity['end_time']); ?>【<?php echo ($actiitystate); ?>】
				</div>
			  </div>
			  <div id="place" class="information">
			    <div id="place_img">
				</div>
				<div id="place_text">地点:<?php echo ($activity['activity_place']); echo ($isactivityempty); ?>
				</div>
			  </div>
			  <div id="host" class="information">
			    <div id="host_img">
				</div>
				<div id="host_text">主办：<?php echo ($activity['activity_org_name']); ?>
				</div>
			  </div>
			  <div id="contact" class="information">
			    <div id="contact_img">
				</div>
				<div id="contact_text">联系方式：<?php echo ($activity['contact_info']); ?>
				</div>
			  </div>
			</div>
			<div id="left3">
			  <div id="activity_introduction">
			    <?php echo ($activity['activity_introduce']); ?>
			  </div>
			  <div id="activity_img">
			  	<img src="__Uploads__/LeaguePost/Large/<?php echo ($activity['activity_post_add']); ?>"/>
			  </div>
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
				    <p>本站通过聚合各团体组织信息、活动信息，
				       形成一个可以满足团体组织宣传自身、宣传所办活动需求的平台，
				       同时吸引在校师生，满足他们便捷获取校园活动信息、团体组织信息的需求。
				    </p>
				  </div>
				  <div id="bottom">
				    <a href="#" id="btn_replay">回复</a>
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