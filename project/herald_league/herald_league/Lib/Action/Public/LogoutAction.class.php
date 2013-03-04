<?php
/*功能：退出登录
*作者：xie
*/
 class LogoutAction extends Action
 {
    public function index()
    {
        session('heraldUser',null);
        session('league',null);
        $this->ajaxreturn( 'succes');
    }
 }
 ?>
