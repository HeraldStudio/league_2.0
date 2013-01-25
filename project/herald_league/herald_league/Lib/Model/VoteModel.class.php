<?php
/**
 * User: xie
 * Date: 13-1-25
 *
 */
class VoteModel extends Model
{
    public function getVoteResult($voteid)
    {
        $voteItem = D('VoteItem');
        $voteItemInf = $voteItem->getVoteItem($voteid);
        $voteResult = M('vote_result');
        foreach($voteItemInf as $n=>$v)
        {
            $result[$n]['item']=$v['item_name'];
            $result[$n]['count']=$voteResult->where(array('item_id'=> $v['id']))->count();
        }
        return $result;
    }

}