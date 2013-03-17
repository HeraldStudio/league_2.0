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

			$heraldSession = D('UserSessionControl');
			if($heraldSession->islogin() == true && $heraldSession->getUserType() == 0)
			{
				return array('id'   =>$heraldSession->getUserID() , 
						     'name' =>$heraldSession->getUserName(),
					);
			}
			else
				return false;
	}
	public function add()
	{
			$lg=$this->getLeagueInfo();
			if($lg==false)
					$this->error('请先登录');
			else
			{
					$activityClass = D('ActivityClass');
					$heatClass = $activityClass->getHeatClass(5);
					$this->assign('league',$lg['name']);
					$this->assign('heatClass',$heatClass);
					$this->assign('username',$lg['name']);
					$this->display();
			}
	}
	public function deal() //最终处理
	{
		if(!$this->isPost())
			$this->error('method is not allowed');
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
				$activityID=$activity->add();
				if($activityID!=false)
				{
					$class=htmlencode($_POST['class']);
					$class = str_replace('多个标签用,分开', '', $class);
					$class = str_replace('，', ',', $class);//中文逗号替换为英文以便后面分割标签
					$classActivity=D('ClassActivity');
					$newClass = explode(',',$class);
					foreach($newClass as $v)
					{
							$classActivity->addClass($activityID,$v);
					}
					$this->success('活动发布成功');
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

	public function upload()
	{


			$lg=$this->getLeagueInfo();
			if($lg==false)
					$this->error('请先登录');
			else
			{
					$time=date('Y-m-d');
					import('ORG.Net.UploadFile');
					$upload = new UploadFile();
					$upload->savePath ="../Uploads/LeaguePost/Original/$lg[id]/$time/";
					$upload->allowExts = array('jpg','gif','png','jpeg');
					$upload->thumb = true;
					if(!is_dir("../Uploads/LeaguePost/Fall/$lg[id]/$time"))
							mkdir("../Uploads/LeaguePost/Fall/$lg[id]/$time",0755,true);
					if(!is_dir("../Uploads/LeaguePost/Large/$lg[id]/$time"))
							mkdir("../Uploads/LeaguePost/Large/$lg[id]/$time",0755,true);
					if(!is_dir("../Uploads/LeaguePost/Small/$lg[id]/$time"))
							mkdir("../Uploads/LeaguePost/Small/$lg[id]/$time",0755,true);
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
							$name = $uploadInf[0]['savename'];
							echo "$lg[id]/$time/$name";
					}
			}
	}
}