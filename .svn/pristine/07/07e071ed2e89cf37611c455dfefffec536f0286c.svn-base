<?php
/*

*名称：社团空间首页

*功能: 社团空间入口

*作者：Tairy

*更新日期：2012.12.17

*/
class HomeAction extends Action
{
    public function index()
	{
		$League = D('League_info');
		$league = $League -> select();
		$this -> assign('league', $league);
		$this -> display();
    }
	public function information()
	{
		$Information = D('League_info');
		$information = $Information -> select();
		$this -> assign('information', $information);
		$this ->display();
	}
	public function album()
	{
		$Album = D('League_album');
		$album = $Album -> select();
		$this -> assign('album', $album);
		$this -> display();
	}
	public function picture()
	{
		$Picture = D('League_picture');
		$picture = $Picture -> select();
		$this -> assign('picture', $picture);
		$this -> display();
	}
}
?>