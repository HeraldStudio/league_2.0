<?php if (!defined('THINK_PATH')) exit();?><h1>用户空间页：</h1>
<img src = "__Uploads__/UserAvatar/m_<?php echo ($userinfo["user_avatar_add"]); ?>"/><br/>
姓名:<a><?php echo ($userinfo["true_name"]); ?></a><br/>
昵称:<a><?php echo ($userinfo["nick_name"]); ?></a><br/>
学院:<a><?php echo ($userinfo["user_college"]); ?></a><br/>
年级:<a><?php echo ($userinfo["user_grade"]); ?></a><br/>
QQ:<a><?php echo ($userinfo["user_qq"]); ?></a><br/>
E-mail:<a><?php echo ($userinfo["user_mail"]); ?></a><br/>
手机：<a><?php echo ($userinfo["user_phone"]); ?></a><br/>
<a href = "__URL__/updateInfo/userid/<?php echo ($userinfo["id"]); ?>">修改我的信息</a><br/>
<a href = "__URL__/comment/userid/<?php echo ($userinfo["id"]); ?>">留言</a><br/>
<a href = "__URL__/attentionActivity/userid/<?php echo ($userinfo["id"]); ?>">关注的活动</a><br/>
<a href = "__URL__/attentionLeague/userid/<?php echo ($userinfo["id"]); ?>">关注的社团</a><br/>