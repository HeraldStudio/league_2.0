<?php if (!defined('THINK_PATH')) exit(); if(is_array($userdata)): $i = 0; $__LIST__ = $userdata;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src = "__Uploads__/<?php echo ($vo['user_avatar_add']); ?>"/><br/>15850692128
	姓名:<a><?php echo ($vo['true_name']); ?></a><br/>
	昵称:<a><?php echo ($vo['nick_name']); ?></a><br/>
	学院:<a><?php echo ($vo['user_college']); ?></a><br/>
	年级:<a><?php echo ($vo['user_grade']); ?></a><br/>
	QQ:<a><?php echo ($vo['user_qq']); ?></a><br/>
	E-mail:<a><?php echo ($vo['user_mail']); ?></a><br/>
	手机：<a><?php echo ($vo['user_phone']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>