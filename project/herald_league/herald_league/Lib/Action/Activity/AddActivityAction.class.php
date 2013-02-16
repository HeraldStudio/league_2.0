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
                    $time = date('Y-m-d');
                    $activity->activity_release_time=$time;
                    $activity->league_id=$lg['id'];
                    $activity->activity_org_name=$lg['name'];

                    import('ORG.Net.UploadFile');
                    $upload = new UploadFile();
                    $upload ->savePath ="../Uploads/LeaguePost/Original/$lg[id]/$time/";
                    $upload->allowExts = array('jpg','gif','png','jpeg');
                    $upload->thumb = true;
                    if(!is_dir("../Uploads/LeaguePost/Fall/$lg[id]/$time"))
                        mkdir("../Uploads/LeaguePost/Fall/$lg[id]/$time",0777,true);
                    if(!is_dir("../Uploads/LeaguePost/Large/$lg[id]/$time"))
                        mkdir("../Uploads/LeaguePost/Large/$lg[id]/$time",0777,true);
                    if(!is_dir("../Uploads/LeaguePost/Small/$lg[id]/$time"))
                        mkdir("../Uploads/LeaguePost/Small/$lg[id]/$time",0777,true);
                    $upload->thumbPrefix="Fall/$lg[id]/$time/,Large/$lg[id]/$time/,Small/$lg[id]/$time/";
                    $upload->thumbMaxWidth = '190,600,96';
                    $upload->thumbMaxHeight = '1000,300,48';
                    $upload->thumbPath='../Uploads/LeaguePost/';
                    $upload->thumbRemoveOrigin = false;
                    if(!$upload->upload())
                        $this->error($upload->getErrorMsg());
                    else
                    {
                        $uploadInf = $upload->getUploadFileInfo();
                        $name = $uploadInf[0][savename];
                        $activity->activity_post_add="$lg[id]/$time/$name";
                    }

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