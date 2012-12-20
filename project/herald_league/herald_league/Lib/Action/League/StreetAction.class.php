<?php
/*

*名称：社团街道页

*功能: 显示社团列表（街道）

*作者：Tairy

*更新日期：2012.12.21

*/
class StreetAction extends Action
{
    public function index()
	{
		/*获取URL参数*/
		$leagueclass = intval($this -> _param('classid'));//这里的这个参数要处理一下 要不很容易就注入了
		
		/*获取街道名称和社团名称*/
		$Street = M('Street');
		$street = $Street -> where('league_class ='.$leagueclass) -> select();
		$looptimes = count($street);
		for( $i = 0; $i < $looptimes; $i++ )
		{
			$League = M('League_info');
			$league = $League -> where('street_id ='.$street[$i]['id']) -> select();
			$this -> streetname = $street[$i]['street_name'];
			$this -> streetid = $street[$i]['id'];
			$this -> assign('league',$league);
			$this -> display();
		}
    }
	public function leagueList()
	{
		/*获取街道id*/
		$streetid = intval($this -> _param('streetid'));
		
		//echo $streetid;
		/*获取相应街道下的社团名单*/
		$League = M('League_info');
		$league = $League -> where('street_id ='.$streetid) -> select();
		$this -> assign('leaguename', $league);
		$this -> display();
	}
}
?>