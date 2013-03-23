<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>搜索结果</title>
<link href="__Public__/Css/search.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/footer.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__Public__/Css/header.css" />
<script src="__Public__/Js/jquery.tools.min.js"></script>  
  <!-- standalone page styling (can be removed) -->
<link rel="stylesheet" type="text/css" href="__Public__/Css/standalone.css"/>
<link rel="stylesheet" href="__Public__/Css/tabs.css" type="text/css" media="screen" />
<link rel="stylesheet" href="__Public__/Css/tabs-panes.css" type="text/css" media="screen" />
<script type="text/javascript" src="__ROOT__/Public/js/jquery.min.js"></script> 
<script language="javascript" src="__ROOT__/Public/Js/login/GreyFrame.js" ></script>
<script type="text/javascript">
				frameMatch = new GreyFrame("MyGreyFrame", 500, 300);
				frameContect = new GreyFrame("ContactFrame", 350, 120);
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
	     <div id="inner_top">
		   <div id="top_inner">
		   <div id="search_logo">
		   </div>
		   <div id="search2">
		      <form name = "search" method = "post" action = "__ROOT__/herald_league/index.php/Public/Search/search">
	            <input name = "search_text" type="text" value="请输入关键字" id = "search_text" style="color:#999;"onfocus="this.style.color='#000000';if(this.value=='请输入关键字'){this.value=''}" onblur="this.style.color='#999';if(this.value==''){this.value='请输入关键字'}"/>
			  <a href="#" id="search_btn">
			    <input type = "submit" value = "" id="search_image2">
		      </a>
		      </form>
		   </div>
		   </div>
		 </div>
		 <div id="inner_bottom">
		   <div id="bottom_left">
		     <ul class="tabs3">
			    <li><a href="#">全部</a></li><!--存放每个页面的名称-->
	            <li><a href="#">活动</a></li><!--存放每个页面的名称-->
	            <li><a href="#">社团</a></li>
             </ul>
		   </div>
		   <div id="bottom_right">
            <!-- tab "panes" -->
              <div class="panes3">
	         <div>
	         	<?php if($isresultempty): ?>搜索结果为空
		   		<?php else: ?>
	         	<?php if(is_array($league)): $i = 0; $__LIST__ = $league;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vl): $mod = ($i % 2 );++$i;?><div id="aactivity<?php echo ($i+2); ?>" class="remark">
				    <div id="aleft<?php echo ($i+2); ?>" class="left">
			          <div id="aclub_img<?php echo ($i+2); ?>" class="user_img">
			          	<img src="__Uploads__/LeagueAvatar/m_<?php echo ($vl["avater_address"]); ?>" alt="" />
				      </div>
					  <div id="aclubname<?php echo ($i+2); ?>" class="clubname">
					  	<?php echo ($vl["league_name"]); ?>
					  </div>
					</div>
				    <div id="aactivity_content<?php echo ($i+2); ?>" class="remark_content">
				      <div id="atop3" class="top">
				        <div id="aactivityname<?php echo ($i+2); ?>" class="username">
				        	<?php echo ($vl["league_name"]); ?>
					    </div>
				      </div>
				      <div id="amiddle<?php echo ($i+2); ?>" class="middle">
				        	<?php echo ($vl["attentednum"]); ?>个关注者
				      </div>
				      <div id="abottom<?php echo ($i+2); ?>" class="bottom">
					    <?php echo ($vl["league_introduce"]); ?>
				      </div>
				    </div>
			    </div><?php endforeach; endif; else: echo "" ;endif; ?>
				<?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$va): $mod = ($i % 2 );++$i;?><div id="aactivity<?php echo ($i+3); ?>" class="remark">
				    <div id="aleft<?php echo ($i+3); ?>" class="left">
			          <div id="aclub_img<?php echo ($i+3); ?>" class="user_img">
			          	<img src="__Uploads__/LeagueAvatar/m_<?php echo ($va["leagueavatar"]); ?>" alt="" />
				      </div>
					  <div id="aclubname<?php echo ($i+3); ?>" class="clubname">
					  	<?php echo ($va["leaguename"]); ?>
					  </div>
					</div>
				    <div id="aactivity_content<?php echo ($i+3); ?>" class="remark_content">
				      <div id="atop<?php echo ($i+3); ?>" class="top">
				        <div id="aactivityname<?php echo ($i+3); ?>" class="username">
				        	<?php echo ($va["activity_name"]); ?>
					    </div>
				      </div>
				      <div id="amiddle<?php echo ($i+3); ?>" class="middle">
				        【<?php echo ($va["acitvitystate"]); ?>】   <?php echo ($va["attentednum"]); ?>个关注者
				      </div>
				      <div id="abottom<?php echo ($i+3); ?>" class="bottom">
					    <?php echo ($va["activity_introduce"]); ?>
				      </div>
				    </div>
			    </div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
			 </div>
			 <div>
			 	<?php if(!empty($activity)): if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vae): $mod = ($i % 2 );++$i;?><div id="bactivity<?php echo ($i+2); ?>" class="remark">
				    <div id="bleft<?php echo ($i+2); ?>" class="left">
			          <div id="bclub_img<?php echo ($i+2); ?>" class="user_img">
			          	<img src="__Uploads__/LeagueAvatar/m_<?php echo ($va["leagueavatar"]); ?>" alt="" />
				      </div>
					  <div id="bclubname<?php echo ($i+2); ?>" class="clubname">
					  	<?php echo ($vae["leaguename"]); ?>
					  </div>
					</div>
				    <div id="bactivity_content<?php echo ($i+2); ?>" class="remark_content">
				      <div id="btop<?php echo ($i+2); ?>" class="top">
				        <div id="bactivityname<?php echo ($i+2); ?>" class="username">
				        	<?php echo ($vae["activity_name"]); ?>
					    </div>
				      </div>
				      <div id="bmiddle<?php echo ($i+2); ?>" class="middle">
				        【<?php echo ($vae["acitvitystate"]); ?>】   <?php echo ($vae["attentednum"]); ?>个关注者
				      </div>
				      <div id="bbottom<?php echo ($i+2); ?>" class="bottom">
					    <?php echo ($vae["activity_introduce"]); ?>
				      </div>
				    </div>
			    </div><?php endforeach; endif; else: echo "" ;endif; ?>
			    <?php else: ?>
			 搜索活动为空<?php endif; ?>
			 </div>
			 <div>
			 	<?php if(!empty($league)): if(is_array($league)): $i = 0; $__LIST__ = $league;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vle): $mod = ($i % 2 );++$i;?><div id="cactivity<?php echo ($i+2); ?>" class="remark">
				    <div id="cleft<?php echo ($i+2); ?>" class="left">
			          <div id="cclub_img<?php echo ($i+2); ?>" class="user_img">
			          	<img src="__Uploads__/LeagueAvatar/m_<?php echo ($vle["avater_address"]); ?>" alt="" />
				      </div>
					  <div id="cclubname<?php echo ($i+2); ?>" class="clubname">
					  	<?php echo ($vle["league_name"]); ?>
					  </div>
					</div>
				    <div id="cactivity_content<?php echo ($i+2); ?>" class="remark_content">
				      <div id="ctop<?php echo ($i+2); ?>" class="top">
				        <div id="cactivityname<?php echo ($i+2); ?>" class="username">
				        	<?php echo ($vle["league_name"]); ?>
					    </div>
				      </div>
				      <div id="cmiddle<?php echo ($i+2); ?>" class="middle">
				        <?php echo ($vl["attentednum"]); ?>个关注者
				      </div>
				      <div id="cbottom<?php echo ($i+2); ?>" class="bottom">
					    <?php echo ($vle["league_introduce"]); ?>
				      </div>
				    </div>
			    </div><?php endforeach; endif; else: echo "" ;endif; ?>
			    <?php else: ?>
			 搜索社团为空<?php endif; ?>
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
<script>
// perform JavaScript after the document is scriptable.
$(function() {
    // setup ul.tabs to work as tabs for each div directly under div.panes
    $("ul.tabs3").tabs("div.panes3 > div");
});
$(function() {
		for(var i=3;i<10;i++){
        // setup ul.tabs to work as tabs for each div directly under div.panes
		$("ul.tabs3").tabs("#abottom"+i);
	    $("ul.tabs3").tabs("#amiddle"+i);
	    $("ul.tabs3").tabs("#aactivityname"+i);
	    $("ul.tabs3").tabs("#atop"+i);
	    $("ul.tabs3").tabs("#aactivity_content"+i);
		$("ul.tabs3").tabs("#aclubname"+i);
	    $("ul.tabs3").tabs("#aclub_img"+i);
		$("ul.tabs3").tabs("#aleft"+i);
        $("ul.tabs3").tabs("#aactivity"+i);
	    $("ul.tabs3").tabs("div.panes3 > div");
		}
    });
	$(function() {
		for(var i=3;i<10;i++){
        // setup ul.tabs to work as tabs for each div directly under div.panes
		$("ul.tabs3").tabs("#bbottom"+i);
	    $("ul.tabs3").tabs("#bmiddle"+i);
	    $("ul.tabs3").tabs("#bactivityname"+i);
	    $("ul.tabs3").tabs("#btop"+i);
	    $("ul.tabs3").tabs("#bactivity_content"+i);
		$("ul.tabs3").tabs("#bclubname"+i);
	    $("ul.tabs3").tabs("#bclub_img"+i);
		$("ul.tabs3").tabs("#bleft"+i);
        $("ul.tabs3").tabs("#bactivity"+i);
	    $("ul.tabs3").tabs("div.panes3 > div");
		}
    });
		$(function() {
		for(var i=3;i<10;i++){
        // setup ul.tabs to work as tabs for each div directly under div.panes
		$("ul.tabs3").tabs("#cbottom"+i);
	    $("ul.tabs3").tabs("#cmiddle"+i);
	    $("ul.tabs3").tabs("#cactivityname"+i);
	    $("ul.tabs3").tabs("#ctop"+i);
	    $("ul.tabs3").tabs("#cactivity_content"+i);
		$("ul.tabs3").tabs("#cclubname"+i);
	    $("ul.tabs3").tabs("#cclub_img"+i);
		$("ul.tabs3").tabs("#cleft"+i);
        $("ul.tabs3").tabs("#cactivity"+i);
	    $("ul.tabs3").tabs("div.panes3 > div");
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
<body>
</html>