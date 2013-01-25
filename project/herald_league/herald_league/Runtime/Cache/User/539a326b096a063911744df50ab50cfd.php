<?php if (!defined('THINK_PATH')) exit();?><h1>我关注的社团</h1>
<?php if(is_array($leagueinfo)): $i = 0; $__LIST__ = $leagueinfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a><?php echo ($vo["league_name"]); ?></a>
	<p><?php echo ($vo["league_introduce"]); ?></p><?php endforeach; endif; else: echo "" ;endif; ?>