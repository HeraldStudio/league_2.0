<?php
/*

*名称：活动添加页

*功能: 添加活动，分三步

*作者：xie

*更新日期：2013.1.22

*/
    class AddActivityAction extends Action
    {
        private function isAuthorized()
        {
            return true;//todo 社团登录才能继续，测试时先忽略
        }
        public function stepOne()
        {
            if(isAuthorized())
            {
            $address = U('Activity/AddActivity/stepTwo');
            $this->assign('add',$address);
            $this->display();
            }
            else
            {
                $this->error('请先登录');
            }
        }
        public function stepTwo()
        {
            $address = U('Activity/Addactivity/stepThree');
            $this->assign('address',$address);
            $this->show();
        }
        public function stepThree()
        {}
        public function deal() //最终处理
        {

        }
    }