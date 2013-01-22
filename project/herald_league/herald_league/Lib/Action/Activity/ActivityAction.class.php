<?php
/*

*名称：活动信息页

*功能: 展示活动信息

*作者：xie

*更新日期：2013.1.21

*/
class ActivityAction extends Action
{//todo use field 输出的时候还要过滤？
    public function index()
    {

       // $heraldSession = D('UserSessionControl'); //控制会话
        $activityID =intval( $this ->_param('activityid') ); //获取url参数
        $activity = D('Activity');
        $activityInf = $activity->find($activityID); //读取主键为$activityID值的数据
        if($activityInf == null || $activityInf == false)  //找不到 或者 查询失败
        {
            // todo echo "ERROR";
        }
        else
        {
            $activity->where(array('id'=>$activityID))->setInc('activity_count');//点击量加一
            $this->assign('activityinf',$activityInf);
            if($activityInf['is_vote'] != 0 )//是投票
            {
                $vote = M('vote');
                $voteInf = $vote->find($activityID);
                $this->assign($voteInf);
                $voteItem = M('vote_item');
                $voteItemInf = $voteItem ->where(array('vote_id'=>$activityInf['id']))->select(); //找到所有选项
                $this->assign($voteItemInf);
                $voteResult = M('vote_result');
                foreach($voteItemInf as $n => $item)
                {
                    $itemCount[$n] = $voteResult->where(array('item_id'=> $item['id']))->count();//统计选项个数
                }
                $this->assign($itemCount);
            }
            $attender = $activity->getAttender($activityID);
            $class = $ctivity->getClass($activityID);
            $this->assign('class',$class);
            $this->assign('attender',$attender);
            $this->display();
        }
    }
}

