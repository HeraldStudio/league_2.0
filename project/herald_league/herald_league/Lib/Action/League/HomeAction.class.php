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
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		
		/*获取社团信息*/
		$League = D('League_info');
		$league = $League -> where('id ='.$leagueid) -> select();
		$this -> assign('league', $league);
		$this -> display();
    }
	public function information()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		
		/*获取社团信息*/
		$Information = D('League_info');
		$information = $Information -> where('id ='.$leagueid) -> select();
		$this -> assign('information', $information);
		$this ->display();
	}
	public function album()
	{
		/*获取URL参数*/
		$leagueid = intval($this -> _param('leagueid'));
		
		/*获取相册信息*/
		$Album = D('League_album');
		$album = $Album -> where('league_id ='.$leagueid) -> select();
		$this -> assign('album', $album);
		$this -> display();
	}
	public function picture()
	{
		/*获取URL参数*/
		$albumid = intval($this -> _param('albumid'));
		
		/*获取相册信息*/
		$Picture = D('League_picture');
		$picture = $Picture -> where('album_id='.$albumid) -> select();
		$this -> assign('picture', $picture);
		$this -> display();
	}
}
?>