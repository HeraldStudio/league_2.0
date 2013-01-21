<?php
/*

*名称：活动信息页

*功能: 展示活动信息

*作者：xie

*更新日期：2013.1.21

*/
class ActivityAction extends Action
{
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
           $activity->where(array('id'=>$$activityID))->setInc('activity_count',1);//点击量加一
            /*foreach ($activityInf as $value)
            {
                $value = htmlspecialchars($value); //转义，防止XSS
            }*///在配置文件中增加自动过滤
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
           $attention = M('attention');
           $attentionInf = $attention ->where(array('attended_id'=>$activityID))->select();
           $user = M('user');
           foreach($attentionInf as $n => $uid)
           {
               $userInf = $user->find($uid['id']);
               $attender[$n]['name'] = $userInf['nick_name'];
               $attender[$n]['avatar'] = $userInf['user_avatar_add'];
           }
            $this->assign('attender',$attender); //todo 处理关注着是社团
            var_dump($attender);
            $this->display();
        }
    }
}