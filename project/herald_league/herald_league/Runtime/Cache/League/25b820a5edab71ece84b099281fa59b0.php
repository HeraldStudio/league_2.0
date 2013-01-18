<?php if (!defined('THINK_PATH')) exit();?><h1>修改社团信息:</h1>
<form name = "update_info" action = "__URL__/leagueAdmin" method = "post"> 
	社团名称：<input type = "text" name = "league_name" value = "<?php echo ($leagueinfo[0]['league_name']); ?>"> </input><br/>
	社团简介：<textarea name = "league_introduce" rows="5" cols="50"><?php echo ($leagueinfo[0]['league_introduce']); ?></textarea><br/>
	社团成员：<textarea name = "league_member" rows="5" cols="50"><?php echo ($leagueinfo[0]['league_member']); ?></textarea><br/>
	<input name = "leagueid" type = "hidden" value = "<?php echo ($leagueid); ?>">
	<input name= "submit" type= "submit" value = "确认"/>
</form>