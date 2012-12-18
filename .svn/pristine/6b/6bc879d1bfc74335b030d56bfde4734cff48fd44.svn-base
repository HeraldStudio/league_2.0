<?php
/*

*名称：社团街道页

*功能: 显示社团列表（街道）

*作者：Tairy

*更新日期：2012.12.17

*/
class StreetAction extends Action{
    public function index(){
	$Street = D('Street');
	$street = $Street -> select();
	$this -> assign('street', $street);
	$this -> display();
    }
}
?>