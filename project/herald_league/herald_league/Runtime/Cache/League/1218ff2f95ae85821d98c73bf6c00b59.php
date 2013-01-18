<?php if (!defined('THINK_PATH')) exit();?><h1>社团注册:</h1>
<form name = "register_form" method = "post" action = "__URL__/leagueRegister">
	社团名称：<input type = "text" name = "league_name" placeholder = "社团名称"> </input><br/>
	社团简介：<textarea name = "league_introduce" rows="5" cols="50" placeholder = "输入简介"></textarea><br/>
	<input type = "submit" name = "submit" value = "提交">
</form>