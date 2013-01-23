<?php
/*

*名称：活动主页

*功能: 主页）

*作者：Xie

*更新日期：2013.1.17

*/
class IndexAction extends Action {
    public function index(){
        $heraldSession = D('UserSessionControl');
        echo $heraldSession->getCardNumber();
    }
}