<?php
/*

*名称：活动信息页

*功能: 展示活动信息

*作者：xie

*更新日期：2013.1.21

*/
class ActivityAction extends Action
{//todo use field 输出的时候还要过滤？
    public function detail()
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
        $activityID = intval($this->_param('activityid'));//todo 检查活动的存在
        $action = $this->_param('action');
        $heraldSession = D('UserSessionControl');
        if( !$heraldSession->islogin())
        {
            $this->error('请先登录');
        }
        else if($heraldSession->getUserType() != 'user' )
        {
            var_dump($heraldSession);
            $this->error('请以个人用户登录');
        }
        else
        {

            $attention = D('attention');
            $cardNumber =$heraldSession->getCardNumber();
            $user = M('user');
            $userInf = $user->where(array('card_num'=>$cardNumber))->find();
            $data['user_id'] = $userInf['id'];
            $data['attended_id']=$activityID;
            if($action == 'add') //增加关注
            {
                $data['isleague'] = 0;
                if($attention->where($data)->find() != null)
                {
                    echo "你已经关注";
                }
                else
                {
                    if($attention->add($data))
                    {
                        $this->success('关注成功');
                        //echo "成功";
                    }
                    else
                    {
                        $this->error('关注失败');
                    }
                }

            }
            else if($action == 'del') //取消关注
            {
                if($attention->where($data)->find() == null)
                {
                   $this->error('你还未关注此活动');
                }
                else
                {
                    if($attention->where($data)->delete())
                    {
                        $this->success('成功取消关注');
                    }
                    else
                    {
                        $this->error('取消关注失败');
                    }
                }

            }
            else
            {
                $this->error('非法的操作');
            }
        }

    }


}

