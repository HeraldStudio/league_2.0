<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xie
 * Date: 13-2-18
 * Time: 下午3:32
 * To change this template use File | Settings | File Templates.
 */
class LoginAction extends Action
{
    public function index()
    {
        C('SHOW_PAGE_TRACE',false);
        $this->display();
    }
}
?>
