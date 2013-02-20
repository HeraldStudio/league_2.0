<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($activityInf["activity_name"]); ?>--活动详情</title>
<link href="__ROOT__/Public/Css/activity.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/footer.css" rel="stylesheet" type="text/css" />
<link href="__ROOT__/Public/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__ROOT__/Public/Css/header.css" />
<script type="text/javascript" src="__ROOT__/Public/js/jquery.js"></script> 
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
        <form name = "search" method = "post" action = "__ROOT__/herald_league/index.php/Public/Search/search">
        <input name = "search_text" type="text" value="请输入关键字" id = "search_text" style="color:#999;"onfocus="this.style.color='#000000';if(this.value=='请输入关键字'){this.value=''}" onblur="this.style.color='#999';if(this.value==''){this.value='请输入关键字'}"/>
        <input type = "submit" value = "搜索" id="search_image">
        </form>
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
                <div id="time_text">时间:<?php echo ($activityInf["start_time"]); ?>---<?php echo ($activityInf["end_time"]); ?>
                    <?php if(empty($isstart)): ?>【未开始】
                    <?php else: ?>
                    <?php if(empty($isend)): ?>【进行中】
                    <?php else: ?>
                        【已结束】<?php endif; endif; ?>
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
                <?php if(is_array($attender)): $i = 0; $__LIST__ = $attender;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$a): $mod = ($i % 2 );++$i;?><a href="#"id="touxiang<?php echo ($a["id"]); ?>" class="tx">
                      <div id="touxiang_img1" class="touxiang_img"><img width=50px height=50px src="__ROOT__/Uploads/UserAvatar/<?php echo (($a["user_avatar_add"])?($a["user_avatar_add"]):"default.jpg"); ?>" alt="" />
                      </div>
                      <div id="touxiang_text1" class="touxiang_text"><?php echo ($a["true_name"]); ?>
                      </div>
                    </a><?php endforeach; endif; else: echo "" ;endif; ?>
                
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