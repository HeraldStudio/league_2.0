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

        $heraldSession = D('UserSessionControl'); //控制会话
        if($heraldSession->isLogin())
        {
            $this->assign('islogin',1);
            $this->assign('userName',$heraldSession->getUserName());
            $uid=$heraldSession->getUserID();
        }
        $uid = $heraldSession->getUserID();
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
            $this->assign('activityInf',$activityInf);
            if($activityInf['is_vote'] != 0 )//是投票
            {
                $this->assign('isvote',true);
                $vote = D('Vote');
                $VoteResult = D('VoteResult');
                $voteResult = $vote->getVoteResult($activityID);
                foreach($voteResult as $n=>$v)
                {
                    if($uid==null || !$VoteResult -> isvoted($uid,$v['id']) )
                    {
                        $voteResult[$n]['isvoted']=0;
                    }
                    else
                    {
                        $voteResult[$n]['isvoted']=1;
                    }
                }
                $this->assign('voteresult',$voteResult);
            }
            $attender = $activity->getAttender($activityID);
            if($attender==NULL)
            {
                 $this->assign('isattended',0);
            }
            else if(!$heraldSession->isLogin() )
            {
                $this->assign('isattended',0);
            }
            else
            {
                foreach ($attender as $a)
                {
                    if($a['id']==$uid)
                    {
                        $this->assign('isattended',1);
                        break;
                    }
                    else
                    {
                        $this->assign('isattended',0);
                    }
                }
            }
            $class    = $activity->getClass($activityID);
            $this->assign('class',$class);
            $this->assign('attender',$attender);

            if(date("Y-m-d",strtotime($activityInf['start_time']))<date("Y-m-d"))
                $this->assign('isstart',1);
            if(date("Y-m-d",strtotime($activityInf['end_time']))>date("Y-m-d"))
                $this->assign('isend',1);

            $this->display();
        }
    }
    public function changeAttention()
    {
        /*
         * 功能 ：添加,删除关注者
         * 参数 : 活动id，动作
         * 返回 :       1=>'关注成功',
                        2=>' 取消关注成功',
                       -1=>'已经关注',
                       -2=>'关注失败',
                       -3=>' 还未关注，无法取消',
                       -4=>' 取消关注失败',
                       -5=>' 非法的操作',
                       -6=>'请求的活动不存在'
                       -7=>'请先登录'
                       -8=>'请以个人用户登录'

         * 作者 : xie
         * 日期 ：2013.1.30
         * todo 修改标签热度?
         */
        $activityID = intval($this->_param('activityid'));
        $action = $this->_param('action');
        $activity = D('Activity');
        if(!$activity->isexist($activityID))
        {
            echo -6;
        }
        else
        {
            $heraldSession = D('UserSessionControl');
            if( !$heraldSession->islogin())
            {
                echo -7;
            }
            else {
                if($heraldSession->getUserType() != 1)
                {
                    echo -8;
                }
                else
                {
                    $attention = D('Attention');
                    $cardNumber =$heraldSession->getCardNumber();
                    $user = D('User');
                    $data['user_id'] = intval($user->getIDbyCardNumber($cardNumber));
                    $data['attended_id']=$activityID;
                    $data['isleague'] = 0;
                    $result = $attention->changeAttention($data, $action);
                    /*$message = array(
                        1=>'关注成功',
                        2=>' 取消关注成功',
                       -1=>'已经关注',
                       -2=>'关注失败',
                       -3=>' 还未关注，无法取消',
                       -4=>' 取消关注失败',
                       -5=>' 非法的操作',
                    );*/
                    echo $result;
                    
                }
            }
        }
    }
}

