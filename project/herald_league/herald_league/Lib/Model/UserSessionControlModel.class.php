<?php
/*

*名称：用户session控制模块

*功能: 建立并控制herald_session_id

*作者：Xie

*更新日期：2012.12.30

*/
    class UserSessionControlModel
    {
        private $sessionID;        //session的ID
        private $userName;         //登陆用户的用户名
        private $cardNumber;       //登陆用户的一卡通号
        private $xml;              //得到的xml
        private $message;          //收到的信息
        
        function __construct()     //构造函数,创建cookie存储sessionID
        {
            if( cookie('herald_seeion_id')=null )    //如果不存在cookie
            {
                $sessionTimeOut = 3600 * 3;//cook超时，单位秒
                $this->applySessionID();//申请SessionID
                $this->dealXML();  //分析xml
                cookie('herald_seeion_id',$sessionID,$sessionTimeOut);//设置cookie
            }
            else
            {
                $this->update();//用cookie更新数据
                $this->dealXML();
            }
        }
        private function dealXML() //处理得到的xml
        {
            $this -> $xml = SimpleXMLElement($message);
            $this -> $cardNumber = $xml->properties->{'herald.sso.studentUser.cardNumber'};
            $this -> $userName = $xml->properties->{'herald.sso.studentUser.fullName'};
            $this -> $sessionID = $xml->id;
        }
        private function applySessionID() //向服务器要session ID
        {
            $ch = curl_init('121.248.63.105/sessionservice/sessions/');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //保存在字符串中
            curl_setopt($ch, CURLOPT_PORT,8080);  //8080端口          
            curl_setopt($ch, CURLOPT_POST,true); //使用post提交
            $this -> $message=curl_exec($ch);  
            curl_close($ch);
        }
        private function update()
        {
            $this -> $sessionID = cookie('herald_session_id');
            $ch = curl_init("121.248.63.105/sessionservice/sessions/$sessionID");
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch,CURL_PORT，8080);
            $this -> $message = curl_exec($ch);
            curl_close();
        }
        public function isLogin()   //判断用户是否登陆,返回true或者false
        {
            if(cookie('herald_session_id')!=null)
                return true;
            return false;
        }
        public function getUserName() //返回用户名
        {
            return $this -> $userName;
        }
        public function getCardNumber() //返回一卡通号
        {
            return $this -> $cardNumber;
        }
        public function getSessionID() //返回sessionID
        {
            return $this -> $sessionID;
        }
    }
?>