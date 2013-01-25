<?php
/*

*名称:UserModel.class.php

*功能: User模块

*作者:Tairy & xie

*更新日期:2013/01/25

*/
class UserModel extends Model
{
    // 定义自动验证
    protected $_validate = array(
        //array('content','require','���ݱ���'),
        );
    // 定义自动完成
    protected $_auto = array(
       // array('content','htmlencode',3,'function'),
        );
    /*

    函数功能：获取用户信息
    
    参数信息：用户的id

      返回值：返回用户信息数组
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */
    public function getUserInfo ( $userid )
    {
    	$userinfo = $this -> where( 'id = '.$userid ) -> find();
    	return $userinfo;
    }
    /*

    函数功能：修改头像地址函数
    
    参数信息：用户id  头像地址

      返回值：返回修改结果
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */
    public function setAvatarAddress( $userid , $avatar_name )
    {
        $result = $this -> where( 'id = '.$userid ) ->setField ( 'user_avatar_add', $avatar_name );
        return $result;
    }   
    public function getIDbyCardNumber($cardnumber)
    {
        /*功能：一卡通号转userid
         *作者:   xie
         *日期 :  2013.1.25
         */
        $cardnumber = intval($cardnumber);
        $id=$this->where(array('card_num'=>$cardnumber))->field('id')->find();
        return $id['id'];
    }
}

?>
