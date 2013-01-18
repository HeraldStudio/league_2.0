<?php if (!defined('THINK_PATH')) exit();?><!--这是获取街道及该街道下的社团名称的模版 模版格式不能变-->
<a href = "__APP__/League/Home/leagueRegister">社团注册</a>
<hr/>
<?php if(is_array($street)): $i = 0; $__LIST__ = $street;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vs): $mod = ($i % 2 );++$i;?><h2><a href = "__APP__/League/Street/leaguelist/streetid/<?php echo ($vs["id"]); ?>"><?php echo ($vs["street_name"]); ?></a><br/></h2>
		<?php if(is_array($league)): foreach($league as $vlk=>$vl): if(($vlk) == $vs["id"]): if(is_array($vl)): $i = 0; $__LIST__ = $vl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vle): $mod = ($i % 2 );++$i;?><a href = "__APP__/League/Home/index/leagueid/<?php echo ($vle["id"]); ?>"><?php echo ($vle["league_name"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; ?>
		<hr/><?php endforeach; endif; else: echo "" ;endif; ?>