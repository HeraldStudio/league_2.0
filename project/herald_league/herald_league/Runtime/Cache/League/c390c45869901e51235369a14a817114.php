<?php if (!defined('THINK_PATH')) exit();?><h2>照片名称：<a href = "__Uploads__/<?php echo ($largepicadd); ?>"><?php echo ($picturename); ?></a></h2>
<p>照片信息：<?php echo ($pictureinfo); ?></p>
<a href = "__Uploads__/<?php echo ($largepicadd); ?>"><img src = "__Uploads__/<?php echo ($smallpicadd); ?>"/></a><br/>
	评论：<a><?php echo ($content); ?></a><br/>
<?php if(is_array($answer)): $i = 0; $__LIST__ = $answer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>回复：<a><?php echo ($vo["content"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>