<?php if (!defined('THINK_PATH')) exit(); if(is_array($album)): $i = 0; $__LIST__ = $album;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>相册名称：<a href = "__APP__/League/Home/picture/albumid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["album_name"]); ?></a><br/>
	相册信息：<p><?php echo ($vo["album_info"]); ?></p>
	<a href = "__APP__/League/Home/picture/albumid/<?php echo ($vo["id"]); ?>"><img src = "__Uploads__/<?php echo ($vo["album_cover_add"]); ?>"/></a>
	<br/>
	<!--<form id="comment_form">
	     <p>发表评论：</p>
		 <textarea rows="5" cols="50"></textarea><br/>
		 <input type="submit" name="submit" id="submit" value="评论" />
	</form>--><?php endforeach; endif; else: echo "" ;endif; ?>
<?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vi): $mod = ($i % 2 );++$i;?><a><?php echo ($vi["comment"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>