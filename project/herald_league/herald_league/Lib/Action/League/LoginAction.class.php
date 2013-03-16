<?php
 /*功能：登录控制器
 *作者：xie
 *日期：2013-02-03
 */
 class LoginAction extends Action
{
    public function index()
    {
        $userName=$this->_param('username');
        $passWord=$this->_param('password');
        $leagueInfo=D('LeagueInfo');
        $result=$leagueInfo->login($userName,$passWord);
        if($result!=null)
        {
            session('league',$result['id']);//session里面存的是社团的id
            $this->success($result['league_name']);//返回社团名称，方便ajax处理
        }
        else
        {
            $this->error($result);
        }
    }
}
?>