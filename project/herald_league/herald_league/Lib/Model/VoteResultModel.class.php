<?php
/*名称:
 *作者:xie
 *日期 ：2013.1.26
 */
class VoteResultModel extends Model
 {
    /*
     * 功能：判断是否已经为某选项投过票
     * 输入：uid，itemid
     * 返回: true /false
     */
    public function isvoted($uid,$itemID)
    {
        if($this->where(array('item_id'=>$itemID,'user_id'=>$uid))->find())
        {
            return true;
        }
        return false;
    }
 }
 ?>