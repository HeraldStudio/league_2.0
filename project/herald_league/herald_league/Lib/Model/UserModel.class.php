<?php
/**
 * User: xie
 * Date: 13-1-25
 * 功能：用户信息模型
 *
 */
class UserModel extends Model
{
    public function getIDbyCardNumber($cardnumber)
    {
        $cardnumber = intval($cardnumber);
        return $this->where(array('card_num'=>$cardnumber))->field('id')->find();
    }
}