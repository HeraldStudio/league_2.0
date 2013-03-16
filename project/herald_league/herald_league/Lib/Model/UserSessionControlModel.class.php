<?php
/*

*名称：用户session控制模块

*功能: 建立并控制HERALD_SESSION_ID

*作者：Xie

*更新日期：2012.1.22

*/
    class UserSessionControlModel
    {
        private $sessionID;        //session的ID
        private $userName;         //登陆用户的用户名
        private $cardNumber;       //登陆用户的一卡通号
        private $xml;              //得到的xml
        private $message;          //收到的信息
        private $userType;       //用户类型，社团0/个人1
        private  $leagueid;             //社团id

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
                setcookie('HERALD_SESSION_ID',null);
            }
            else
            {   
                if(!isset( $_COOKIE['HERALD_SESSION_ID'] ))    //如果不存在cookie
                {
                    define('SessionTimeOut',3600*3);//cookie超时，单位秒
                    $this->applySessionID();//申请SessionID
                    //$this->dealXML();  //分析xml
                    setcookie('HERALD_SESSION_ID',$this->sessionID,time()+SessionTimeOut);//设置$_COOKIE
                }
                else
                {
                    $this->update();//用cookie更新数据
                    $this->dealXML();
                }
            trace('message',$this->message);
            trace('username',$this->userName);
            }
        }
        private function dealXML() //处理得到的xml
        {
            $this ->xml = new SimpleXMLElement($this->message);
            $this -> cardNumber = intval($this->xml->properties->{'herald.sso.studentUser.cardNumber'});
            $this -> userName =strval($this-> xml->properties->{'herald.sso.studentUser.fullName'});
            $this -> sessionID =strval($this->xml->id);
            $this ->userType = 1;
        }
        private function applySessionID() //向服务器要session ID
        {
//          $ch = curl_init('121.248.63.105:8080/sessionservice/sessions/');
            $ch = curl_init('127.0.0.1/'.__ROOT__.'/sso.php');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //保存在字符串中
//            curl_setopt($ch, CURLOPT_PORT,8080);  //8080端口
            curl_setopt($ch, CURLOPT_POST,true); //使用post提交
            $this -> message=curl_exec($ch);
            curl_close($ch);

            //临时使用字符串代替进行测试
//            $tempxml=<<<STR
//    <xml>
//       <id>111222333</id>
//            <properties>
//                <herald.sso.studentUser.cardNumber>888888</herald.sso.studentUser.cardNumber>
//                <herald.sso.studentUser.fullName>test</herald.sso.studentUser.fullName>
//            </properties>
//     </xml>
//STR;
//            $this->message = $tempxml;
        }
        private function update()
        {
            $this -> sessionID = $_COOKIE['HERALD_SESSION_ID'];
//            $ch = curl_init("121.248.63.105/sessionservice/sessions/$this->sessionID");
            $ch = curl_init('127.0.0.1/'.__ROOT__.'/sso.php');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($ch, CURLOPT_PORT,8080);
            $this -> message = curl_exec($ch);
            curl_close($ch);

//            $this->applySessionID();//todo临时措施，从字符串读数据，仅用来测试
        }
        public function isLogin()   //判断用户是否登陆,返回true或者false
        {
            if($this->userName != "")
                return true;
            return false;
        }
        public function getUserName() //返回用户名
        {
            return $this -> userName;
        }
        public function getCardNumber() //返回一卡通号
        {
            return $this -> cardNumber;
        }
        public function getSessionID() //返回sessionID
        {
            return $this ->sessionID;
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
