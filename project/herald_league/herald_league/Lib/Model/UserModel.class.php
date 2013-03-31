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
        public function getUserInfo ( $userdata )
        {
                if(is_int($userdata))
                {
                    $userinfo = $this -> where( 'id = '.$userdata ) -> find();
                    return $userinfo;
                }
                else
                {
                        foreach ( $userdata as $userdatas ) 
                        {
                                $temp=$this -> where ( 'id = '.$userdatas['user_id'] ) -> select();
                                $userinfo[$userdatas['user_id']] =$temp[0];
                        
                        }
                        return $userinfo;
                }
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
        /*功能：一卡通号转userid
         *作者:   xie
         *日期 :  2013.1.25
         */
        public function getIDbyCardNumber($cardnumber)
        {
                
                $cardnumber = intval($cardnumber);
                $id =$this->field('id')->getByCardNum($cardnumber);
                return $id['id'];
        }
        /*功能：登陆后更新数据
         *作者:   xie
         *日期:  2013.3.4
         *返回： 第一次登陆返回0
         */
        public function update($result)
        {
                $result = explode(',', $result);
                $name = htmlencode($result[0]);
                $card = intval($result[1]);
                $info = $this->getByCardNum($card);
                if($info == null || $info == false)//没有注册
                {
                    $data=array(
                            'card_num'=>$card,
                            'true_name'=>$name,
                            'last_login_time',date('Y-m-d'),
                            'nick_name'=>$name,
                            );
                    $this->add($data);
                    return 0;
                }
                else
                {
                        $this->where("card_num = $card")->setField('last_login_time',date('Y-m-d'));
                        $this->where("card_num = $card")->setInc('times',1);
                        return 1;
                }
        }
}

?>
