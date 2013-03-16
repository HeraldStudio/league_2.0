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
        if(!is_array($voteItemInf))
        {
            return null;
        }
        $voteResult = M('vote_result');
        foreach($voteItemInf as $n=>$v)
        {
            $result[$n]['id']=$v['id'];
            $result[$n]['item']=$v['item_name'];
            $result[$n]['count']=$voteResult->where(array('item_id'=> $v['id']))->count();
        }
        return $result;
    }
    /*
     * 功能
     */

}
?>