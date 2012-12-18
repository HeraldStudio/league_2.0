<?php
/*

*名称：用户session控制模块

*功能: 建立并控制herald_session_control

*作者：Xie

*更新日期：2012.12.18

*/
    class UserSessionControl
    {
        function __construct()     //构造函数,创建cookie存储sessionID
		{
		}
		
		private $sessionID;        //session的ID
        private $userName;         //登陆用户的用户名
		private $cardNumber;       //登陆用户的一卡通号
		private $xml;              //得到的xml
		private function dealXML() //处理得到的xml
		{
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
		
	}
?>