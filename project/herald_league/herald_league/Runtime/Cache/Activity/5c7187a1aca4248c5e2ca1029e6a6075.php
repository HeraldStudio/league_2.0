<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<link rel="stylesheet" href="__ROOT__/Public/Css/fabu/fabu.css" type="text/css" media="screen" />
				<link rel="stylesheet" href="__ROOT__/Public/Css/fabu/jquery-ui.css" />
				<link rel="stylesheet" href="__ROOT__/Public/Css/uploadify/uploadify.css"/>
				<link rel="stylesheet" href="style.css" />
				<script src="__ROOT__/Public/Js/jquery.js"></script>
				<script src="__ROOT__/Public/Js/fabu/jquery-ui.js"></script>

				<script type="text/javascript" src="__ROOT__/Public/Js/Uploadify/jquery.uploadify-3.1.min.js"></script>
				<script>
								$(function() {
												$( "#startdate" ).datepicker();
												$( "#startdate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
								});
								$(function() {
												$( "#enddate" ).datepicker();
												$( "#enddate" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
								});
								function step(x)
								{
												$(".step").each(function(){
																$(this).hide();
												})
												$("#step"+x).show();
								}
				</script>
				<script type="text/javascript">
								$(function() {
												$('#file_upload').uploadify({
																'swf'      : '__ROOT__/Public/Images/uploadify/uploadify.swf',
																'uploader' : "<?php echo U('Activity/AddActivity/Upload/');?>",
																'auto'     : true,
																'width'    : 500,
																'buttonText' : '选择海报',
																'fileTypeExts' : '*.gif; *.jpg; *.png',
																'fileTypeDesc' : '图像文件',
										 
																'onDialogClose'      : function(event,ID,fileObj) {
																								$('#haibao').css('border',"0px solid #999");
																								$("#preview").hide();
																								$("#file_upload-queue").show();
																				},
																'onUploadSuccess' : function(file, data, response) {
																				//alert('The file was saved to: ' + data);
																				$("#file_upload-queue").hide();
																				$("#imgAdd").val(data);
																				$('#haibao').css('border',"5px solid #999");
																				$("#preview").attr('src',"__ROOT__/Uploads/LeaguePost/Original"+data).show();
																				
																}
																
												});
								});
				</script>
</head>
<body>
<form action = "<?php echo U('/Activity/AddActivity/Deal');?>" method="POST" enctype="multipart/form-data">
				<div id="step1" class="step">
								<div class="line" id="line1">
												<div id="activityname1" class="title">活动名称</div>
												<div class="xing">*</div>
												<div id="input1" class="input"><input name = "activity_name" id="activity_text1" class="input_text" type="text"/></div>
								</div>
								<div class="line" id="line2">
												<div id="time" class="title">活动日期</div>
												<div class="xing">*</div>
												<div id="input2" class="input"><input name="start_time" id="startdate" class="date" type="text"/></div>
												<div class="to">至</div>
												<div id="input3" class="input"><input name="end_time" id="enddate" class="date" type="text"/></div>
								</div>
								<div class="line" id="line3">
												<div id="time" class="title">具体时间</div>
												<div id="input4" class="input"><input name="specific_time" id="specificTime" class="inputtime" type="text" /></div>
								</div>
								<div class="line" id="line4">
												<div id="place" class="title">活动地点</div>
												<div class="xing">*</div>
												<div id="input6" class="input"><input name="activity_place" id="place_text" class="input_text" type="text"/></div>
								</div>
								<div class="line" id="line5">
												<div id="host" class="title">主办单位</div>
												<div class="xing">*</div>
												<div id="input7" class="input"><input disabled id="host_text" class="input_text" type="text" value="<?php echo ($league); ?>"/></div>
								</div>
								<div class="line" id="line6">
												<div id="contact" class="title">联系方式</div>
												<div class="xing">*</div>
												<div id="input8" class="input"><input name="contact_info" id="contact_text" class="input_text" type="text"/></div>
								</div>
								<div class="line" id="line7">
												<a href="javascript:;" onclick="javascript:step(2)" target="MyGreyFrame" id="next1" class="next">下一步></a>
								</div>
				</div>
				<div id="step2" class="step" style="display: none">
								<div class="line" id="line1">
												<div id="activitybiaoqian" class="title">活动标签</div>
												<div class="xing">*</div>
												<div id="input1" class="input"><input name="class" id="activity_text1" class="input_text" type="text" value="多个标签用,分开" onfocus="if(this.value=='多个标签用,分开'){this.value=''}" onblur="if(this.value==''){this.value='多个标签用,分开'}"/></div>
								</div>
								<div class="line" id="line8">
												<div id="biaoqiantitle" class="title">常用标签:</div>
												<?php if(is_array($heatClass)): foreach($heatClass as $key=>$c): ?><div class="biaoqian"><?php echo ($c["class_name"]); ?></div><?php endforeach; endif; ?>
								</div>
								<div class="line" id="line9">
												<div id="detail" class="title">活动详情</div>
												<div class="xing">*</div>
												<div id="input6" class="input">
														<form name="form1" method="post" action="" >
																<iframe id="myiframe" src="./Edit/editor.htm?id=content&ReadCookie=0" frameborder="0" scrolling="no" width="500" height="200">
																</iframe>
														</form>
												</div>
								</div>
								<div class="line" id="line10">
												<div id="attach" class="title">添加附件</div>
								</div>
								<div class="line" id="line11">
												<a href="javascript:;" onclick="javascript:step(1)" target="MyGreyFrame" id="pre" class="pre"><上一步</a>
												<a href="javascript:;" onclick="javascript:step(3)" target="MyGreyFrame" id="next" class="next">下一步></a>
								</div>
				</div>
				<div id="step3" class="step" style="display: none">
								<div class="line">
												<input type="file" name="file_upload" id="file_upload" />
												
												<div class="haibao" id="haibao">
												<img id="preview" style="display:none" width="100%" height="100%"></img>
												
												</div>
												</div>
								<div class="line">
								<a href="javascript:;" onclick="javascript:step(2)" target="MyGreyFrame" id="pre" class="pre"><上一步</a>
								<input type="submit" value="确认发布" id="next" class="next"/>
								<input type="hidden" id="imgAdd" name="imgAdd"/>
								</div>
				</div>
</form>
</body>
</html