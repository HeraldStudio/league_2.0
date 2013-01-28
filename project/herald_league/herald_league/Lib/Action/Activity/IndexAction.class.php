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
        $this->assign('detail',U('Activity/Activity/detail/'));
        $this->assign('recent',$recent);
        /* 热门标签*/
        $class = M('activity_class');
        $heatClass = $class->order('heat desc')->limit(6)->field('class_name')->select();
        $this->assign('heatclass',$heatClass);
        $this->assign('attention',U('/Activity/Activity/changeAttention/'));
//        import('@.ORG.VerifyCode');
//        $ver = new VerifyCode();
//        $this->assign('ver',$ver->generate());

        $this->display();
    }
}