<?php if (!defined('THINK_PATH')) exit();?><form name = "comment_form" id = "comment_form" method = "post" action = "__URL__/communion">
	 <textarea name = "content_c" rows="2" cols="50" placeholder = "给主人留言..."></textarea><br/>
	 <input type="submit" name="submit" id="submit" value="留言" />
	 <input type = "hidden" name = "subdata_c" value = "<?php echo ($leagueid); ?>" />
</form>
<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><h2><?php echo (getcommenterinfo($vo['comming_id']*10+$vo['comming_type'])); ?>留言:<?php echo ($vo["content"]); ?></h2>
	<?php if(is_array($answer)): foreach($answer as $vak=>$va): if(($vak) == $vo["id"]): if(is_array($va)): $i = 0; $__LIST__ = $va;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vae): $mod = ($i % 2 );++$i;?><a><?php echo (getcommenterinfo($vae['answering_id']*10+$vae['answering_type'])); ?>回复:<?php echo ($vae["content"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; ?>
	<form name = "answer_form" id = "answer_form" method = "post" action = "__URL__/communion">
		<textarea name = "content_a" rows="1" cols="50" placeholder = "回复..."></textarea>
		<input type = "hidden" name = "subdata_a" value = "<?php echo ($vo["id"]); ?>" />
		<input type="submit" name="submit" id="submit" value="回复" />
	</form>
	<hr/><?php endforeach; endif; else: echo "" ;endif; ?>