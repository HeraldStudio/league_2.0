<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活动详情</title>
<link href="__Public__/Css/img_comment.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/footer.css" rel="stylesheet" type="text/css" />
<link href="__Public__/Css/totop.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="__Public__/Css/header.css" />
<script src="__Public__/Js/jquery.min.js"></script> 
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
$(document).ready(function(){
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
                $("#textlimit1")[0].focus();
                $("#textlimit1").val("回复"+$.trim($("#username_3").html())+" : ");
                $("#hidden").val($("#answer_hidden").val());
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
$(document).ready(function(){
	$("#submitanswer").click(function(){
		$.ajax({
			url:'<?php echo U('addAnswer');?>',
			type: 'post',
			dataType:'html',
			data:'data='+$("#hidden").val()+'&content='+$("#textlimit1").val(),
			success:function(data){
				//alert(data);
				//document.write(data);
				location.reload();//todo
			}
		})
	});
});
</script>
</head>
<body>
	    <div id="inner_left">
		  <div id="left_content">
			<div id="left3">
			  <div id="activity_img">
			  	<img src="__Uploads__/LeagueAlbum/Large/<?php echo ($picture['large_picture_add']); ?>"/>
			  </div>
			  <div id="share">
			     <div id="share_text">分享至
				 </div>
			  </div>
			</div>
			<div id="left4">
			  <div id="remark_3" class="remark1">
			   	<?php if(!empty($comment)): if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vc): $mod = ($i % 2 );++$i;?><div id="user_img_3" class="user_img">
			    	<img src="__Uploads__/Avatar/m_<?php echo (getcommenteravatar($vc['comming_id']*10+$vc['comming_type'])); ?>" alt="" />
				</div>
					<div id="remark_content_3" class="remark_content1">
					  <div id="top_3" class="top1">
					  	<input type="hidden" id = "answer_hidden" value = "<?php echo ($vc['id']); ?>/<?php echo ($vc['comming_id']); ?>/<?php echo ($vc['comming_type']); ?>"></input>
					    <div id="username_3" class="username1">
					    	<?php echo (getcommentername($vc['comming_id']*10+$vc['comming_type'])); ?>
						</div>
						<div id="remark_time_3" class="remark_time">
							<pre><?php echo ($vc["comment_date"]); ?>  <?php echo ($vc["comment_time"]); ?></pre>
						</div>
					  </div>
					  <div id="middle_3" class="middle1">
					    <p style="display:block;">
					       <?php echo ($vc["content"]); ?>
					    </p>
					  </div>
					  <div id="bottom_3" class="bottom1">
					      <a class="btn_replay_3" href = "javascript:void(0);">回复</a>
					  </div>
					</div>
				   	<?php if(is_array($answer)): foreach($answer as $vak=>$va): if(($vak) == $vc["id"]): if(is_array($va)): $i = 0; $__LIST__ = $va;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vae): $mod = ($i % 2 );++$i;?><div id="user_img_3" class="user_img">
								<img src="__Uploads__/Avatar/m_<?php echo (getcommenteravatar($vae['answering_id']*10+$vae['answering_type'])); ?>" alt="" />
								</div>
								<div id="remark_content_3" class="remark_content1">
									<div id="top_3" class="top1">
										<input type="hidden" id = "answer_hidden" value = "<?php echo ($vc['id']); ?>/<?php echo ($va['answering_id']); ?>/<?php echo ($va['answering_type']); ?>"></input>
										<div id="username_3" class="username1">
											<?php echo (getcommentername($vae['answering_id']*10+$vae['answering_type'])); ?>
										</div>
										<div id="remark_time_3" class="remark_time">
											<pre><?php echo ($vae['answer_date']); ?> <?php echo ($vae['answer_time']); ?></pre>
										</div>
									</div>
									<div id="middle_3" class="middle1">
									<p style="display:block;">
										<?php echo ($vae["content"]); ?>
									</p>
									</div>
									<div id="bottom_3" class="bottom1">
										<a class="btn_replay_3" href = "javascript:void(0);">回复</a>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; endforeach; endif; else: echo "" ;endif; ?>
		        </div>
			<div class="layout">
                <div class="box">
                	<textarea  id="textlimit1" name="textarea" class="textlimit" cols="45" rows="1" placeholder="说点什么吧..."></textarea>
	                <p>
	                	<input id = "hidden"type = "hidden" name = "subdata_a" value = "<?php echo ($pictureid); ?>/<?php echo ($type); ?>/comment" />
	                    <input class="input-button" name = "submit" type="submit" id = "submitanswer" value="回复" />
	                    <span class="textCount">0/140</span>
	                </p>
                </div>
            </div>
			<?php else: ?>
			<br/>
			<div class="layout">
                <div class="box">
                <textarea  id="textlimit1" name="textarea" class="textlimit" cols="45" rows="1" placeholder="说点什么吧..."></textarea>
                <p>
                	<input id = "hidden"type = "hidden" name = "subdata_a" value = "<?php echo ($activityid); ?>/<?php echo ($type); ?>/comment" />
                    <input class="input-button" name = "submit" type="submit" id = "submitanswer" value="提交" />
                    <span class="textCount">0/140</span>
                </p>
                </div>
            </div><?php endif; ?>
			</div>
			</div>
		  </div> 
		</div>
<body>
</html>