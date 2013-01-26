<?php
/**
  * User: xie
 * Date: 13-1-25
 */
class VoteItemModel extends Model
{
    public function getVoteItem($voteid)
    {
        return $this->where(array('vote_id'=>intval($voteid)))->select();
    }
}