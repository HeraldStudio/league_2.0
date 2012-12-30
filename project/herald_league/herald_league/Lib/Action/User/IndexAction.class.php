<?php
/*

*名称：用户空间页面

*功能: 实现用户空间页面上内容的现实和相应的功能

*作者：Tairy

*更新日期：2012.12.17

*/
class IndexAction extends Action {

    /*这个函数实现用户空间静态信息的显示*/
	
    public function index(){
	$User = D('User'); // 实例化Data数据模型
	$userdata = $User -> limit(1) -> select();
	$this -> assign('userdata', $userdata);
	$this -> display();
    }
}
?>