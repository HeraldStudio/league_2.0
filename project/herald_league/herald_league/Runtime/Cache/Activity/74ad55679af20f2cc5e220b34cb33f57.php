<?php if (!defined('THINK_PATH')) exit();?><html xmlns="http://www.w3.org/1999/html">
<!--todo 取消注释
<head>
<script type="text/javascript" src="__ROOT__/Public/Js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){  
  $("#verify").keyup(function(){
     $.getJSON("<?php echo U('Public/VerifyCode/Check');?>",{"code":$("#verify").val()},function(data,status){
        if(data.status==1)
            $("#verify").css("background-color","#00FF00");
        else
            $("#verify").css("background-color","#FF0000");
    });
  });
 $("#vimg").click(function(){
     var time=new Date().getTime();
     $(this).attr("src","<?php echo U('/Public/VerifyCode/Generate/');?>"+"/"+time);
     if($("#verify").val()!="")
        $("#verify").css("background-color","#FF0000");
    });
 });
</script>
</head>
<body>
<form action = "<?php echo U('/Activity/AddActivity/Deal');?>" method="POST" enctype="multipart/form-data">
    <input type="text" name="activity_name">活动名称 </input><br>
    <input type="text" name="start_time">开始时间 </input><br>
    <input type="text" name="end_time">结束时间 </input><br>
    <input type="text" name="activity_introduce">活动介绍 </input><br>
    <input type="file" name="post">海报地址 </input><br>
    <input type="text" name="contact_info">联系方式 </input><br>
    <input type="text" name="is_vote">是否投票 </input><br>
    <input type="text" name="activity_place">活动地址 </input><br>
    <input type="text" name="class">标签，以逗号分开</input></br>
    <img id="vimg" src="<?php echo U('/Public/VerifyCode/Generate/');?>"></img>
    <input id="verify" type="text" name="verifyCode" >验证码 </input></br>
    <input type="submit" > </input>

</form>
</body>
</html>
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>活动发布</title>
    <script language="javascript" src="__ROOT__/Public/Js/jquery.js" ></script>
    <script language="javascript" src="__ROOT__/Public/Js/fabu/GreyFrame.js" ></script>
    <script type="text/javascript">
        frameMatch = new GreyFrame("MyGreyFrame", 500, 300);
        frameContect = new GreyFrame("ContactFrame", 350, 120);
    </script>
</head>
<body onload="is_login()">
<a style="position:absolute;position:fixed;right:0px;top:350px;display:block;height:60px;width:24px;font-size:16px;color:#fff;background-color:#000;opacity:.6;line-height:30px;" href="content.html" target="MyGreyFrame">发布</a>

</body>
</html>