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
        $activity = M('activity');
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
            $attender = $this->getAttender($activityID);
            $class = $this->getClass($activityID);
            $this->assign('class',$class);
            $this->assign('attender',$attender);
            $this->display();
        }
    }
    private function getAttender($activityID)
    {
        /*
         * 功能 获取关注者
         * 修改日期 2013.1.21
         *
         */

        $attention = M('attention');
        $attentionInf = $attention ->where(array('attended_id'=>$activityID,'isleague'=>0))->select();
        if($attentionInf == false ||$attentionInf == null)//查询失败
        {
            return null;
        }
        $user = M('user');
        foreach($attentionInf as $n => $u)
        {
            $userInf = $user->find($u['user_id']);
            $attender[$n]['name'] = $userInf['nick_name'];
            $attender[$n]['avatar'] = $userInf['user_avatar_add'];
        }
        return $attender;
    }
    private function getClass($activityID)
    {
        /*
         * 功能：得到活动标签
         * 日期:2013.1.21
         */
        $class_activity = M('class_activity');
        $activity_class = M('activity_class');
        $classInf = $class_activity->where(array('activityid'=>$activityID))->select();
        if($classInf == null  || $classInf ==false)
        {
            return null;
        }
        foreach ($classInf as $n=>$c)
        {
            $tag = $activity_class->find($c['class_id']);
            $activity[$n]=$tag['class_name'];
        }
        return $activity;
    }
}

