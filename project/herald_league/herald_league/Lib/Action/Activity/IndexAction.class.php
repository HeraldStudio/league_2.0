<?php
/*

*名称：活动主页

*功能: 主页

*作者：Xie

*更新日期：2013.1.24

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

        /* 上面大海报的近期活动*/
        import('ORG.Util.Date');
        $activity = D('Activity');
        $attention = D('Attention');
        $recent = $activity->recent(5);//上面的近期活动
        $date = new Date (date('Y-m-d'));
        foreach($recent as $n=>$r)
        {
            $recent[$n]['isstart']=  $date->dateDiff($r['start_time']); //与当前日期比较判断是否已经开始
            if($uid==0)
                $recent[$n]['isattended'] =false; //没登录，自然没关注
            else
            {
                $codition = array(
                    'user_id'=>$uid,
                    'attended_id'=>$recent[$n]['id'],
                    'isleague'=>0,
                );
                if($attention->getAttentionState($codition))
                {
                    $recent[$n]['isattended'] = true;//已经关注了
                }
                else
                {
                    $recent[$n]['isattended'] =false;//没关注
                }
            }
        }
        $this->assign('detailadd',U('Activity/Activity/detail/'));
        $this->assign('recent',$recent);
        /* 热门标签*/
        $class = D('ActivityClass');
        define('HeatClassLimit', 6);
        $heatClass = $class->getHeatClass(HeatClassLimit);
        $this->assign('heatClass',$heatClass);
        $this->assign('attention',U('/Activity/Activity/changeAttention/'));
        /*热门活动*/
        $heatActivity = $activity->getHeatActivity();
        $this->assign('heatActivity',$heatActivity);
        $this->display();
    }
}