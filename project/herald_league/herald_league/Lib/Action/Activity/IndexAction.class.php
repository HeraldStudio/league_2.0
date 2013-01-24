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
        import('ORG.Util.Date');
        /* 上面大海报的近期活动*/
        $activity = D('Activity');
        $recent = $activity->recent(5);//上面的近期活动
        $date = new Date (date('Y-m-d'));
        foreach($recent as $n=>$r)
        {
            $recent[$n]['isstart']=  $date->dateDiff($r['start_time']); //与当前日期比较判断是否已经开始
        }
        $this->assign('recent',$recent);
        /* 热门标签*/
        $class = M('activity_class');
        $heatClass = $class->order('heat desc')->limit(6)->field('class_name')->select();
        $this->assign('heatclass',$heatClass);

        $this->display();
    }
}