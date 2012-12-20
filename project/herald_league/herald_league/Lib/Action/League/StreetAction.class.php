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
	//print_r($street);
	/*获取每个街道的社团列表*/
	for( $i = 0; $i < 2; $i++ )
	{
		$League = D('League_info');
		$league = $League -> where('street_id ='.$street[$i]['id']) -> find();
		$league_all[$i] = $league;
		//print_r($league);
	}
	//print_r($league_all);
	/*显示格式*/
	$this -> assign('street', $street);
	$this -> assign('league', $league_all);
	
	$this -> display();
    }
}
?>