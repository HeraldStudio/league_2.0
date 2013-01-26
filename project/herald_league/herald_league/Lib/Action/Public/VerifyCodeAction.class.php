<?php
/*
 * 功能：验证码
 * 作者：xie
 * 更新日期:2013.1.23
 */
    class VerifyCodeAction extends Action
    {
        public function generate() //生成验证码
        {
            import('ORG.Util.Image');
            $length     =  4;         //  验证码的长度，默认为4位数
            $model      =  3;         //验证字符串的类型，默认为数字，其他支持类型有0 字母 1 数字 2 大写字母 3 小写字母 4中文 5混合
            $type       =  'png';     //验证码的图片类型，默认为png
            $width      =  50;        //验证码的宽度，默认会自动根据验证码长度自动计算
            $height     =  22;        //  验证码的高度，默认为22
            $verifyName =  'verfy';   //验证码的SESSION记录名称，默认为verify
            Image::buildImageVerify($length,$mode,$type,$width,$height,$verifyName);
        }
    }