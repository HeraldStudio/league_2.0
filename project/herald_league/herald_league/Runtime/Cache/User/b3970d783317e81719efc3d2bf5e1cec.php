<?php if (!defined('THINK_PATH')) exit();?><h1>我关注的活动</h1>
<?php if(is_array($activityinfo)): $i = 0; $__LIST__ = $activityinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>活动名称：<a><?php echo ($vo["activity_name"]); ?></a><br/>
	活动介绍：<p><?php echo ($vo["activity_introduce"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>