<?php
/*

*名称：用户session控制模块

*功能: 建立并控制herald_session_control

*作者：Xie

*更新日期：2012.12.20

*/
    class UserSessionControl
    {
        function __construct()     //构造函数,创建cookie存储sessionID
        {
            if( !isset(cookie('herald_seeion_id')))    //如果不存在cookie
            {
                $sessionID = applySessionID();
                cookie('herald_seeion_id',$sessionID);
            }
        }
        
        private $sessionID;        //session的ID
        private $userName;         //登陆用户的用户名
        private $cardNumber;       //登陆用户的一卡通号
        private $xml;              //得到的xml
        private function dealXML() //处理得到的xml
        {
        }
        private function applySessionID() //向服务器要session ID
        {
            $ch = curl_init('121.248.63.105/sessionservice/sessions/');
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //如果把这行注释掉的话，就会直接输出  
            curl_setopt($ch, CURLOPT_POST,true); //使用post提交
			$xml=curl_exec($ch);  
            curl_close($ch); 
        }
        public function isLogin()   //判断用户是否登陆,返回true或者false
        {
        }
        public function getUserName() //返回用户名
        {
        }
        public function getCardNumber() //返回一卡通号
        {
        }
        public function getSessionID() //返回sessionID
        {
        }
    }
?>