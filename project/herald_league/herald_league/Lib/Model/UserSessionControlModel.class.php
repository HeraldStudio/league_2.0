<?php
/*

*名称：用户session控制模块

*功能: 建立并控制HERALD_SESSION_ID

*作者：Xie

*更新日期：2012.1.22

*/
    class UserSessionControlModel
    {
        private $userName;         //登陆用户的用户名
        private $cardNumber;       //登陆用户的一卡通号
        private $xml;              //得到的xml
        private $message;          //收到的信息
        private $userType;       //用户类型，社团0/个人1
        private $leagueid;             //社团id

        function __construct()
        {
            if(session('?league') )//社团已登录
            {
                $this->userType = 0;
                $this->leagueid = session('league');
                $lg = M('league_info');
                $lgInf = $lg->find($this->leagueid);
                $this->userName = $lgInf['league_name'];
                $this->cardNumber = 0;
            }
            else if(session('?heraldUser')) //个人已登录
            {   
                $info = explode(',', session('heraldUser')) ;
                $this->userName   = $info[0];
                $this->cardNumber = $info[1];
                $this->userType   = 1;
            }
        }
        public function isLogin()   //判断用户是否登陆,返回true或者false
        {
            if($this->userName != "")
                return true;
            return false;
        }
        public function getUserName() //返回用户名
        {
            return $this ->userName;
        }
        public function getCardNumber() //返回一卡通号
        {
            return $this ->cardNumber;
        }
        public function getUserType()  //返回用户类型
        {
            return $this->userType;
        }
        public function getUserID() //用户在数据库中的id
        {
            if($this->getUserType() == 0)
            {
                return $this->leagueid;
            }
            else
            {
                $user = D('User');
                return $user->getIDbyCardNumber($this->getCardNumber());
            }
        }
    }

?>
