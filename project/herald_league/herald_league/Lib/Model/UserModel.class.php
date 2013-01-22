<?php
/*

*名称：UserModel.class.php

*功能: User模型类

*作者：Tairy

*更新日期：2013/01/18

*/
class UserModel extends Model
{
	// 定义自动验证
    protected $_validate = array(
        //array('content','require','内容必须'),
        );
    // 定义自动完成
    protected $_auto = array(
       // array('content','htmlencode',3,'function'),
        );

    public function getUserInfo ( $userid )
    {
    	$userinfo = $this -> where( 'id = '.$userid ) -> find();
    	return $userinfo;
    }

    public function setAvatarAddress( $userid , $avatar_name )
    {
        $result = $this -> where( 'id = '.$userid ) ->setField ( 'user_avatar_add', $avatar_name );
        return $result;
    }
}

?>