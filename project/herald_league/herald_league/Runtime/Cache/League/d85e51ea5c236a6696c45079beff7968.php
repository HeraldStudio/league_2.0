<?php if (!defined('THINK_PATH')) exit();?><!--这是获取街道及该街道下的社团名称的模版 模版格式不能变-->
<h2><a href = "__APP__/League/Street/leaguelist/streetid/<?php echo ($streetid); ?>"><?php echo ($streetname); ?></a><br/></h2>
<?php if(is_array($league)): $i = 0; $__LIST__ = $league;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a href = "__APP__/League/Home/index/leagueid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["league_name"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>