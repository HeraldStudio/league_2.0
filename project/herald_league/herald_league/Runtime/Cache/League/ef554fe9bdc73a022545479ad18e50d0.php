<?php if (!defined('THINK_PATH')) exit(); if(is_array($leagueclass)): $i = 0; $__LIST__ = $leagueclass;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href = "__APP__/League/Street"><?php echo ($vo["class_name"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>