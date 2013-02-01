<?php
/*

*名称：活动添加页

*功能: 添加活动，分三步

*作者：xie

*更新日期：2013.1.22

*/
    class AddActivityAction extends Action
    {
        private function getLeagueName()
        {
            
            return true;//todo 社团登录才能继续，测试时先忽略
        }
        public function add()
        {
            if(getLeagueName()!=false)
            {
                $this->display();
            }
            else
            {
                $this->error('请先登录');
            }
        }
        public function deal() //最终处理
        {
            if(getLeagueName()!=false)
            {
                $activity=D('Activity');
                $activity->create();
                $activity->release_time=date("Y-m-d");
                $activity->activity_org_name=getLeagueName();
                $activity->add();
            }
            else
            {
                $this->error('请先登录');
            }
        }
    }