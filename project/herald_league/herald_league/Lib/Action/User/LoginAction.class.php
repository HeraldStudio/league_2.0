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
    public function index()//显示登录框
    {
        C('SHOW_PAGE_TRACE',false);
        $this->display();
    }

    public function login()//处理登录
    {
        $card = $this->_param('cardNumber');
        $pass = $this->_param('passWord');
        $result = $this->authen($card,$pass);
        if($result != null)
        {
            session(array('name'=>'heraldUser','expire'=>3600));
            session('heraldUser',$result);
            $user  = D('User');
            $user->update($result);
            $this->success('');
        }
        else
        {
            $this->error('');
        }

    }
    private function authen($card,$pass) //验证一卡通，密码是否正确
    {
        if($card == 1) //todo 等待java那边处理好
            return 'test,1234';
        return null ;
    }
}
