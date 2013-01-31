<?php if (!defined('THINK_PATH')) exit(); if(is_array($information)): $i = 0; $__LIST__ = $information;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><img src = "__Uploads__/LeagueAvatar/herald.jpg" />
社团名称<a><?php echo ($vo["league_name"]); ?></a><br/>
社团介绍<p><?php echo ($vo["league_introduce"]); ?></p>
社团成员<p><?php echo ($vo["league_member"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>