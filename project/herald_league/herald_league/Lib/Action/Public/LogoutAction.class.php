<?php
/*功能：退出登录
*作者：xie
*/
 class LogoutAction extends Action
 {
    public function index()
    {
        cookie('HERALD_SESSION_ID',null);
        session('league',null);
        //$this->redirect(U('/Activity/Index'));
        echo "succes";
    }
 }
 ?>