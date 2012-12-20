<?php
/*

*名称：社团街道页

*功能: 显示社团列表（街道）

*作者：Tairy

*更新日期：2012.12.21

*/
class StreetAction extends Action{
    public function index(){
	
	/*获取URL参数*/
	$leagueclass = $this -> _param('classid');
	
	/*获取满足条件的街道列表*/
	$Street = D('Street');
	$street = $Street -> where('league_class ='.$leagueclass) -> select();
	
	/*获取满足条件的社团列表*/
	$LeagueName = D('League_info');
	$leaguename = $LeagueName -> where('league_class ='.$leagueclass) -> select();
	
	/*显示格式*/
	$this -> assign('street', $street);
	$this -> assign('leaguename', $leaguename);
	
	$this -> display();
    }
}
?>