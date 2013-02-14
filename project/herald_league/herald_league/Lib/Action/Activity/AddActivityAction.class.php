<?php
/*

*名称：活动添加页

*功能: 添加活动

*作者：xie

*更新日期：2013.1.22

*/
    class AddActivityAction extends Action
    {
        private function getLeagueInfo()
        {
            $lg = array('id' => 1, 'name'=>'东南大学先声网');
            return $lg;//todo 社团登录才能继续，测试时先忽略
        }
        public function Add()
        {
            if($this->getLeagueInfo()!=false)
            {
                $this->display();
            }
            else
            {
                $this->error('请先登录');
            }
        }
        public function Deal() //最终处理
        {
            if($this->getLeagueInfo()!=false)
            {
                $activity=D('Activity');
                if($activity->create())
                {
                    $lg=$this->getLeagueInfo();
                    $activity->activity_release_time=date("Y-m-d");
                    $activity->league_id=$lg['id'];
                    $activity->activity_org_name=$lg['name'];
                    $activityID=$activity->add();
                    if($activityID!=false)
                    {
                        $class=htmlencode($_POST['class']);
                        $classActivity=D('ClassActivity');
                        $newClass = explode(',',$class);
                        foreach($newClass as $v)
                        {
                            $classActivity->addClass($activityID,$v);
                        }
                        $this->success('');
                    }

                }
                else
                    $this->error($activity->getError());
            }
            else
            {
                $this->error('请先登录');
            }
        }
    }