<?php
/*

*名称：活动信息页

*功能: 展示活动信息

*作者：xie

*更新日期：2013.1.26

*/
class ActivityAction extends Action
{//todo use field 输出的时候还要过滤？
    public function detail()
    {

       // $heraldSession = D('UserSessionControl'); //控制会话
        $activityID =intval( $this ->_param('activityid') ); //获取url参数
        $activity = D('Activity');
        $activityInf = $activity->getActivityInfoById($activityID); //读取主键为$activityID值的数据
        $activityInf = $activityInf[0];//返回的是数组的数组，只取第一个
        if($activityInf == null || $activityInf == false)  //找不到 或者 查询失败
        {
            $this->error('你所查找的活动不存在');
        }
        else
        {
            $activity->where(array('id'=>$activityID))->setInc('activity_count',1);//点击量加一
            $this->assign('activityinf',$activityInf);
            if($activityInf['is_vote'] != 0 )//是投票
            {
                $this->assign('isvote',true);
                $vote = D('Vote');
                $voteResult = $vote->getVoteResult($activityID);
                $this->assign('voteresult',$voteResult);
                //print_r($voteResult);
            }
            $attender = $activity->getAttender($activityID);
            $class    = $activity->getClass($activityID);
            $this->assign('class',$class);
            $this->assign('attender',$attender);
            $this->display();
        }
    }
    public function changeAttention()
    {
        /*
         * 功能 ：添加,删除关注者
         * 参数 : 活动id，动作
         * 作者 : xie
         * 日期 ：2013.1.24
         * todo 修改标签热度
         */
        $activityID = intval($this->_param('activityid'));
        $action = $this->_param('action');
        $activity = D('Activity');
        if(!$activity->isexist($activityID))
        {
            $this->error('请求的活动不存在');
        }
        else
        {
            $heraldSession = D('UserSessionControl');
            if( !$heraldSession->islogin())
            {
                $this->error('请先登录');
            }
            else if($heraldSession->getUserType() != 'user' )
            {
                $this->error('请以个人用户登录');
            }
            else
            {
                $attention = D('Attention');
                $cardNumber =$heraldSession->getCardNumber();
                $user = D('User');
                $data['user_id'] = intval($user->getIDbyCardNumber($cardNumber));
                $data['attended_id']=$activityID;
                $data['isleague'] = 0;
                $this->assign('result',$attention->changeAttention($data,$action));
            }
            $this->display();
        }
    }
}

