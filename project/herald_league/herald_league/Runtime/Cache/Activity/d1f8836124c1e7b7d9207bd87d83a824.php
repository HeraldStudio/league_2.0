<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/html">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="__ROOT__/Public/Css/fabu/fabu.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="__ROOT__/Public/Css/fabu/jquery-ui.css" />
    <script src="__ROOT__/Public/Js/jquery.js"></script>
    <script src="__ROOT__/Public/Js/fabu/jquery-ui.js"></script>
    <link rel="stylesheet" href="style.css" />
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
            <div id="time" class="title">活动时间</div>
            <div class="xing">*</div>
            <div id="input2" class="input"><input name="start_time" id="startdate" class="date" type="text"/></div>
            <div class="to">至</div>
            <div id="input3" class="input"><input name="end_time" id="enddate" class="date" type="text"/></div>
        </div>
        <div class="line" id="line3">
            <div id="input4" class="input"><input id="starttime" class="inputtime" type="text"/></div>
            <div class="to">至</div>
            <div id="input5" class="input"><input id="endtime" class="inputtime" type="text"/></div>
        </div>
        <div class="line" id="line4">
            <div id="place" class="title">活动地点</div>
            <div class="xing">*</div>
            <div id="input6" class="input"><input name="activity_place" id="place_text" class="input_text" type="text"/></div>
        </div>
        <div class="line" id="line5">
            <div id="host" class="title">主办单位</div>
            <div class="xing">*</div>
            <div id="input7" class="input"><input id="host_text" class="input_text" type="text"/></div>
        </div>
        <div class="line" id="line6">
            <div id="contact" class="title">联系方式</div>
            <div class="xing">*</div>
            <div id="input8" class="input"><input name="contact_info" id="contact_text" class="input_text" type="text"/></div>
        </div>
        <div class="line" id="line7">
            <a onclick="javascript:step(2)" target="MyGreyFrame" id="next1" class="next">下一步></a>
        </div>
    </div>
    <div id="step2" class="step" style="display: none">
        <div class="line" id="line1">
            <div id="activitybiaoqian" class="title">活动标签</div>
            <div class="xing">*</div>
            <div id="input1" class="input"><input name="class" id="activity_text1" class="input_text" type="text"/></div>
        </div>
        <div class="line" id="line8">
            <div id="biaoqiantitle" class="title">常用标签:</div>
            <div class="biaoqian">校内讲座</div>
            <div class="biaoqian">晚会表演</div>
            <div class="biaoqian">企业宣传</div>
            <div class="biaoqian">社团招新</div>
            <div class="biaoqian">校园比赛</div>
            <div class="biaoqian">体育竞技</div>
        </div>
        <div class="line" id="line9">
            <div id="detail" class="title">活动详情</div>
            <div class="xing">*</div>
            <div id="input6" class="input"><textarea id="detail_text" class="input_text" type="text"></textarea></div>
        </div>
        <div class="line" id="line10">
            <div id="attach" class="title">添加附件</div>
        </div>
        <div class="line" id="line11">
            <a onclick="javascript:step(1)" target="MyGreyFrame" id="pre" class="pre"><上一步</a>
            <a onclick="javascript:step(3)" target="MyGreyFrame" id="next" class="next">下一步></a>
        </div>
    </div>
    <div id="step3" class="step" style="display: none">
        <div class="line" id="line1">
            <div id="activitybiaoqian" class="title">添加海报</div>
            <div class="xing">*</div>
            <div id="input1" class="input"><input name="post" id="activity_text1" class="input_text" type="file"/></div>
        </div>
        <div class="line" id="line8">
            <div class="haibao"><img src="A3.jpg" /></div>
        </div>
        <div class="line" id="line11">
            <a onclick="javascript:step(2)" target="MyGreyFrame" id="pre" class="pre"><上一步</a>
            <input type="submit" id="next" class="next"></input>

        </div>
    </div>
</form>
</body>
</html>