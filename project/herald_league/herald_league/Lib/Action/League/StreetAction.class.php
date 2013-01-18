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
		$Street = D('Street');
		$street = $Street -> getStreerInfo ( $leagueclass );

		$this -> assign( 'street',$street );

		$league = $Street -> getLeagueListOfStreet( $street );

		$this -> assign('league',$league);
		$this -> display();
    }
	public function leaguelist()
	{
		/*获取街道id*/
		$streetid = intval($this -> _param('streetid'));
		
		/*获取相应街道下的社团名单*/
		$League = M('League_info');
		$league = $League -> where('street_id ='.$streetid) -> select();
		$this -> assign('leaguename', $league);
		$this -> display();
	}
}
?>