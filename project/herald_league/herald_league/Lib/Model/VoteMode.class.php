<?php
/**
 * User: xie
 * Date: 13-1-25
 *
 */
class VoteActionModel extends Action
{
    public function getVoteResult($voteid)
    {
        $voteItem = $this->find($voteid);
        $voteResult = M('vote_result');
        foreach($voteItem as $n=>$v)
        {
            $result[$n]['item']=$v['item_name'];
            $result[$n]['count']=$voteResult->where(array('item_id'=> $v['id']))->count();
        }
        return $result;
    }

}