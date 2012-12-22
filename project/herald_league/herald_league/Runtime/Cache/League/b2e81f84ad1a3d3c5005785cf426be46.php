<?php if (!defined('THINK_PATH')) exit();?><h2>相册名称：<a href = "__APP__/League/Home/picture/albumid/<?php echo ($albumid); ?>"><?php echo ($albumname); ?></a></h2>
<p>相册信息：<?php echo ($albuminfo); ?></p>
<a href = "__APP__/League/Home/picture/albumid/<?php echo ($albumid); ?>"><img src = "__Uploads__/<?php echo ($albumcoveradd); ?>"/></a>
<br/>
<!--<form id="comment_form">
	 <p>发表评论：</p>
	 <textarea rows="5" cols="50"></textarea><br/>
	 <input type="submit" name="submit" id="submit" value="评论" />
</form>-->
	评论：<a><?php echo ($content); ?></a><br/>
<?php if(is_array($answer)): $i = 0; $__LIST__ = $answer;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>回复：<a><?php echo ($vo["content"]); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>