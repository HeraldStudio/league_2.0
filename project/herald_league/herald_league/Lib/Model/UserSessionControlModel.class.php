<?php
/*

*名称：用户session控制模块

*功能: 建立并控制herald_session_id

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
        private $userType;         //用户类型，社团/个人

        function __construct()     //构造函数,创建cookie存储sessionID
        {
            if( cookie('herald_session_id')==null )    //如果不存在cookie
            {
                $sessionTimeOut = 3600 * 3;//cook超时，单位秒
                $this->applySessionID();//申请SessionID
                $this->dealXML();  //分析xml
                cookie('herald_session_id',$this->sessionID,$sessionTimeOut);//设置cookie
                $this->userType = 'user';
            }
            else
            {
                $this->update();//用cookie更新数据
                $this->dealXML();
            }
            if(session('league') != null)//社团已登录
            {
                $this->userType = "league";
                $leagueid = session('league');
                $lg = M('league_info');
                $lgInf = $lg->find($leagueid);
                $this->userName = $lgInf['league_name'];
                $this->cardNumber = 0;
            }
        }
        private function dealXML() //处理得到的xml
        {
            $this ->xml = new SimpleXMLElement($this->message);
            $this -> cardNumber = $this->xml->properties->{'herald.sso.studentUser.cardNumber'};
            $this -> userName =$this-> xml->properties->{'herald.sso.studentUser.fullName'};
            $this -> sessionID =$this->xml->id;
        }
        private function applySessionID() //向服务器要session ID
        {
          /*$ch = curl_init('121.248.63.105/sessionservice/sessions/');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //保存在字符串中
            curl_setopt($ch, CURLOPT_PORT,8080);  //8080端口          
            curl_setopt($ch, CURLOPT_POST,true); //使用post提交
            $this -> message=curl_exec($ch);
            curl_close($ch);
          */
            //临时使用字符串代替进行测试
            $tempxml=<<<STR
            <xml>
            <id>
            111222333
            </id>
            <properties>
                <herald.sso.studentUser.cardNumber>888888</herald.sso.studentUser.cardNumber>
                <herald.sso.studentUser.fullName>tset</herald.sso.studentUser.fullName>
            </properties>
            </xml>
STR;
            $this->message = $tempxml;
        }
        private function update()
        {
            $this -> sessionID = cookie('herald_session_id');
            /*$ch = curl_init("121.248.63.105/sessionservice/sessions/$this->sessionID");
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_PORT,8080);
            $this -> message = curl_exec($ch);
            curl_close($ch);
            */
            $this->applySessionID();//临时措施，从字符串读数据，仅用来测试
        }
        public function isLogin()   //判断用户是否登陆,返回true或者false
        {
            if($this->userName != null)
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
    }
