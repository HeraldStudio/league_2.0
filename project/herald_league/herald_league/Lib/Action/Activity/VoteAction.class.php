<?php
/*
 * 名称：投票控制器
 * 作者: xie
 * 日期：2013.1.26
 */
class VoteAction extends Action
{
    /*
     * 功能：增加投票
     * 输入：itemID
     * 返回：代码
     */
    public function Vote()
    {
        $voteItem = D('VoteItem');
        $itemid = $this->_param('itemid');
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
            $uid = $heraldSession->getUserID();
            $result=$voteItem->voteIt(intval($itemid),$uid);
            //todo deal with result
            trace('r',$result);
            $this->display();
        }
    }
}