<?php if (!defined('THINK_PATH')) exit();?><!--<form id="comment_form">
	 <p>发表评论：</p>
	 <textarea rows="5" cols="50"></textarea><br/>
	 <input type="submit" name="submit" id="submit" value="评论" />
</form>-->
<?php if(is_array($album)): $i = 0; $__LIST__ = $album;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2>相册名称：
		<a href = "__APP__/League/Home/picture/albumid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["album_name"]); ?>
		</a>
	</h2>
	<p>
		相册信息：<?php echo ($vo["album_info"]); ?>
	</p>
	<a href = "__APP__/League/Home/picture/albumid/<?php echo ($vo["id"]); ?>">
		<img src = "__Uploads__/<?php echo ($vo["album_cover_add"]); ?>"/>
	</a>
	<br/>
	<?php if(is_array($comment)): foreach($comment as $vck=>$vc): if(($vck) == $vo["id"]): if(is_array($vc)): $i = 0; $__LIST__ = $vc;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vce): $mod = ($i % 2 );++$i;?><h3>
					<?php echo (getcommenterinfo($vce['comming_id']*10+$vce['comming_type'])); ?>评论：<?php echo ($vce["content"]); ?>
				</h3>
				<?php if(is_array($answer)): foreach($answer as $vak=>$va): if(($vak) == $vce["id"]): if(is_array($va)): $i = 0; $__LIST__ = $va;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vae): $mod = ($i % 2 );++$i;?><a><?php echo (getcommenterinfo($vae['answering_id']*10+$vae['answering_type'])); ?>回复:<?php echo ($vae["content"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; endforeach; endif; else: echo "" ;endif; ?>