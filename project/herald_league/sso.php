<?php
/**
 * Created by JetBrains PhpStorm.
 * User: xie
 * Date: 13-2-18
 * Time: 下午3:13
 * To change this template use File | Settings | File Templates.
 */
$login=<<<STR
    <session>
       <id>111222333</id>
            <properties>
                <herald.sso.studentUser.cardNumber>888888</herald.sso.studentUser.cardNumber>
                <herald.sso.studentUser.fullName>test</herald.sso.studentUser.fullName>
            </properties>
     </session>
STR;
$notlogin=<<<STR
    <session>
       <id>111222333</id>
            <properties>
            </properties>
     </session>
STR;
$name = $_POST['username'];
$pass = $_POST['password'];
if($name == 1234 && $pass == 1234)
{
    setcookie('ssotest',1);
}
else
{
    if($_COOKIE['ssotest'] == 1)
      echo $login;
    else
        echo $login;
}