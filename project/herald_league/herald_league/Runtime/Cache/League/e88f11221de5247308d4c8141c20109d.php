<?php if (!defined('THINK_PATH')) exit();?><h1><?php echo ($league[0]['league_name']); ?></h1>
<h3>虚拟地址:<?php echo ($classname); ?>-<?php echo ($streetname); ?></h3>
	<?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><a><?php echo ($vi["activity_name"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>
<a href = "__APP__/League/Home/album/leagueid/<?php echo ($league[0]['id']); ?>">相册<a/><br/>
<a href = "__APP__/League/Home/communion/leagueid/<?php echo ($league[0]['id']); ?>">交流区<a/><br/>