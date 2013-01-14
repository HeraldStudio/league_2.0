<?php if (!defined('THINK_PATH')) exit(); if(is_array($picture)): $i = 0; $__LIST__ = $picture;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2>照片名称：
		<a href = "__Uploads__/{vo.large_picture_add}"><?php echo ($vo["picture_name"]); ?>
		</a>
	</h2>
	<p>
		照片信息：<?php echo ($vo["picture_info"]); ?>
	</p>
	<a href = "__Uploads__/<?php echo ($vo["large_picture_add"]); ?>">
		<img src = "__Uploads__/<?php echo ($vo["small_picture_add"]); ?>"/>
	</a>
	<br/>
	<?php if(is_array($comment)): foreach($comment as $vck=>$vc): if(($vck) == $vo["id"]): if(is_array($vc)): $i = 0; $__LIST__ = $vc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vce): $mod = ($i % 2 );++$i;?><h3>
					<?php echo (getcommenterinfo($vce['comming_id']*10+$vce['comming_type'])); ?>评论：<?php echo ($vce["content"]); ?>
				</h3>
				<?php if(is_array($answer)): foreach($answer as $vak=>$va): if(($vak) == $vce["id"]): if(is_array($va)): $i = 0; $__LIST__ = $va;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vae): $mod = ($i % 2 );++$i;?><a><?php echo (getcommenterinfo($vae['answering_id']*10+$vae['answering_type'])); ?>回复:<?php echo ($vae["content"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; endforeach; endif; else: echo "" ;endif; ?>