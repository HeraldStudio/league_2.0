<?php
/*

*名称：活动主页

*功能: 主页

*作者：Xie

*更新日期：2013.1.30

*/
class IndexAction extends Action {
    public function Index(){
        $heraldSession = D('UserSessionControl');
        if($heraldSession->islogin())
        {
            $this->assign('islogin',1);
            $this->assign('name',$heraldSession->getUserName());
            $uid=$heraldSession->getUserID();
        }
        else
        {
            $this->assign('islogin',0);
            $uid = 0;
        }
        $this->assign('uid',$uid);
        /* 上面大海报的近期活动*/
        import('ORG.Util.Date');
        $activity = D('Activity');

        $recent = $activity->recent(5);//上面的近期活动
        $date = new Date (date('Y-m-d'));
        foreach($recent as $n=>$r)
        {
            $recent[$n]['isstart']=  $date->dateDiff($r['start_time']); //与当前日期比较判断是否已经开始
        }
            
        $this->assign('recent',$recent);
        /* 热门标签*/
        $class = D('ActivityClass');
        define('HeatClassLimit', 6);
        $heatClass = $class->getHeatClass(HeatClassLimit);
        $this->assign('heatClass',$heatClass);
        $this->assign('attentionadd',U('/Activity/Activity/changeAttention/'));
        /*热门活动*/
        $heatActivity = $activity->getHeatActivity();//默认选6个
        $this->assign('heatActivity',$heatActivity);
        /*主体部分的活动*/
        $activities = $activity->getActivityByLimit();//默认选取10个
        $activities = $this->dealAttention($activities,$uid);
        $this->assign('activities',$activities);
        /*热门社团*/
        $leagueInfo=D('LeagueInfo');
        $this->assign('heatLeague',$leagueInfo->getHeatLeague());//默认选取7个
        $this->display();
    }

    /**处理活动数组是否要关注
     * @param array $activities
     * @param int $uid
     * @return array
     */
    private function dealAttention( &$activities=array(),$uid=0)
    {
        $attention = D('Attention');
        foreach ($activities as $n => $a)
        {
            if($uid==0)
                $activities[$n]['isattended'] =0; //没登录，自然没关注
            else
            {
                $condition = array(
                    'user_id'=>$uid,
                    'attended_id'=>$activities[$n]['id'],
                    'isleague'=>0,
                );
                if($attention->getAttentionState($condition))
                {
                    $activities[$n]['isattended'] = 1;//已经关注了
                }
                else
                {
                    $activities[$n]['isattended'] =0;//没关注
                }
            }
        }
        return $activities;
    }


    /**显示更多，只能ajax访问，
     * @param $count
     * @param $uid
     */
    public function GetMore($count,$uid)
    {
        $activity = D('Activity');
        $activities = $activity->getMore($count);
        if($activities ==null )
            $this->ajaxReturn("");
        else
        {
            $activities = $this->dealAttention($activities,$uid);
            foreach($activities as $k=>$v)
            {
                if($v['isattended']==1)
                {
                    $attended = "inline";
                    $notattended ="none";
                }
                else
                {
                    $attended = "none";
                    $notattended ="inline";
                }
                $id=$v['id'];
                $key =$k;
                $activity_name=$v['activity_name'];
                $activity_post_add=$v['activity_post_add'];
                $detail=U('Activity/Activity/detail/');
                $root = __ROOT__;
                $html=<<<HTML
        <li>
              <a target="_blank" href="$detail/activityid/$id"><img width=190px src="$root/Uploads/LeaguePost/Fall/$activity_post_add" alt="" /></a>
              <a target="_blank" href="$detail/activityid/$id"><div class="activity_title">$activity_name</div></a>
                <a href="javascript:void(0)" onclick="javascript:changeAttention($id,'del',$key)" class="attention" id="attention%d_isattended" style="display:$attended" >
                  <div class="attention_text" id="attention_text">取消关注
                  </div>
                </a>
                <a href="javascript:void(0)" onclick="javascript:changeAttention($id,'add',$key)" class="attention" id="attention%d_notattended"  style="display:$notattended" >
                 <div class="attention_img" id="attention_img">
                 </div>
                 <div class="attention_text" id="attention_text">关注
                 </div>
                </a>
            </li>
HTML;
                $html = sprintf($html,$key,$key);
                $result[$k]=$html;
            }


            $this->ajaxReturn($result);
        }
    }
}