<?php if (!defined('THINK_PATH')) exit();?><h1>社团注册:</h1>
<form name = "register_form" method = "post" action = "__URL__/leagueRegister">
用户名：&nbsp&nbsp&nbsp&nbsp<input name = "username" type = "text" placeholder = "输入用户名"/><br/>
密码：&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input name= "password" type = "password" placeholder = "输入密码"/><br/>
确认密码：<input name="comfirm_password" type="password" placeholder="再次输入密码"/><br/>
社团名称：<input type = "text" name = "league_name" placeholder = "社团名称"/><br/>
社团简介：<textarea name = "league_introduce" rows="5" cols="50" placeholder = "输入简介"></textarea><br/>
<input type = "submit" name = "submit" value = "提交">
</form>