<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($league)): $i = 0; $__LIST__ = $league;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h1><?php echo ($vo["league_name"]); ?></h1>
	<?php if(is_array($activity)): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><a><?php echo ($vi["activity_name"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>
<a href = "__APP__/League/Home/album/leagueid/<?php echo ($vo["id"]); ?>">相册<a/><br/>
<a href = "__APP__/League/Home/communion/leagueid/<?php echo ($vo["id"]); ?>">交流区<a/><br/><?php endforeach; endif; else: echo "" ;endif; ?>