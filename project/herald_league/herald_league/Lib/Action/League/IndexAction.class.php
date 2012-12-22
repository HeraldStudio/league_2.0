<?php
/*

*名称：社团类别页

*功能: 显示社团类别 社团模块入口

*作者：Tairy

*更新日期：2012.12.17

*/
class IndexAction extends Action {
    public function index()
	{
		$LeagueClass = D('League_class');
		$leagueclass = $LeagueClass -> select();
		$this -> assign('leagueclass', $leagueclass);
		$this -> display();
    }
}
?>