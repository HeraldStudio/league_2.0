<?php if (!defined('THINK_PATH')) exit();?>	<!--注意当评论为空的情况-->
	评论：<a><?php echo ($content); ?></a><br/>
<?php if(is_array($answer)): $i = 0; $__LIST__ = $answer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>回复：<a><?php echo ($vo["content"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>