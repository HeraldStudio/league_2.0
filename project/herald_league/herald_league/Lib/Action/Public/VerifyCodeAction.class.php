<?php
/*
 * ���ܣ���֤��
 * ���ߣ�xie
 * ��������:2013.1.23
 */
    class VerifyCodeAction extends Action
    {
        public function generate() //������֤��
        {
            import('ORG.Util.Image');
            $length     =  4;         //  ��֤��ĳ��ȣ�Ĭ��Ϊ4λ��
            $model      =  3;         //��֤�ַ��������ͣ�Ĭ��Ϊ���֣�����֧��������0 ��ĸ 1 ���� 2 ��д��ĸ 3 Сд��ĸ 4���� 5���
            $type       =  'png';     //��֤���ͼƬ���ͣ�Ĭ��Ϊpng
            $width      =  50;        //��֤��Ŀ��ȣ�Ĭ�ϻ��Զ�������֤�볤���Զ�����
            $height     =  22;        //  ��֤��ĸ߶ȣ�Ĭ��Ϊ22
            $verifyName =  'verfy';   //��֤���SESSION��¼���ƣ�Ĭ��Ϊverify
            Image::buildImageVerify($length,$mode,$type,$width,$height,$verifyName);
        }
    }