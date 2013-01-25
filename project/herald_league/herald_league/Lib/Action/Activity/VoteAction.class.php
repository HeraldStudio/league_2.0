<?php
//合并到活动页
/*

*名称：投票页

*功能: 显示投票详情

*作者：xie

*更新日期：2013.1.20


class VoteAction extends Action
{
    public function Index() //投票页
    {
        $voteID = intval($this->_param('voteid'));
        $activity = M('activity');
        $activityInf = $activity->find($voteID);
        if($activityInf == null || $activityInf == false)
        {
            echo "error"; //todo show error messsage
        }
        else if($activityInf['is_vote'] == 0)
        {
            redirect(U('activity/activity/index','activityid = $voteID'));//转到活动详情页
        }
        else
        {
            $vote = M('vote');
            $voteInf = $vote->find($voteID);
            if($voteInf == null || $voteInf == false)
            {
                echo "error"; // todo show error message
            }
            else
            {
                $voteInf['vote_name'] = htmlspecialchars($voteInf['vote_name']);//防止xss
                $this->assign($activityInf);
                $this->assign($voteInf);
                //start to find vote item
                $voteItem = M('vote_item');
                $voteItemInf = $voteItem->where( array('vote_id' => '$voteID'))->select();

            }
        }
    }
}
*/