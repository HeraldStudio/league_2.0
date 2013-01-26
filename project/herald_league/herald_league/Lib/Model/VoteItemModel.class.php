<?php
/**
  * User: xie
 * Date: 13-1-25
 */
class VoteItemModel extends Model
{
    /*
     * 功能：得到某投票下的所有选项
     * 输入：投票的id
     * 返回：选项的数组
     * 日期: 2013.1.26
     * 作者：xie
     */
    public function getVoteItem($voteid)
    {
        return $this->where(array('vote_id'=>intval($voteid)))->select();
    }
    /*
     * 功能：判断选项是否存在
     * 输入：选项的id
     * 返回：true/false
     * 日期：2013.1.26
     * 作者：xie
     */
    public function isexist($voteItemID)
    {
        if($this->find($voteItemID))
            return true;
        return false;
    }
    /*
     * 功能：向指定的选项投票
     * 输入：选项的id,uid.
     * 返回：结果代码
     *        1: 成功
     *       -1：已经投过
     *       -2：超过票数限制
     *       -3：选项不存在
     *       -4：已过期
     *       -5：投票不存在
     *       -6: 写入数据库错误
     * 日期：2013.1.26
     * 作者：xie
     */
    public function voteIt($VoteItemID,$uid)
    {
        if(!$this->isexist($VoteItemID))
            return -3;
        else
        {
            $voteID = $this->where(array('id'=>$VoteItemID))->field('vote_id')->find();
            $voteID = $voteID['vote_id'];trace('vid',$voteID);//从数组里取出
            $vote = D('Vote');
            $limit = $vote->where(array('id'=>$voteID))->field('available_num')->find();
            $limit = $limit['available_num'];//从数组里取出
            if($limit == null )
            {
                return -5;
            }
            if(!$vote->where(array('end_tiem'=>array('elt',date('Y-m-d'))))->find())
            {
                return -4;
            }
            $voteResult=D('VoteResult');
            if($voteResult->isvoted($uid,$VoteItemID))
            {
                   return -1;
            }
            $count = $this->where(array('id'=>$VoteItemID))->count();
            if($count>=$limit)
            {
                return -2;
            }
            else
            {
                if($voteResult->add(array('item_id'=>$VoteItemID,'user_id'=>$uid)))
                {
                    return 1;
                }
                else
                {
                    return -6;
                }
            }
        }
    }
}