<?php
/*
 * 名称：投票控制器
 * 作者: xie
 * 日期：2013.1.28
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
            $this->ajaxReturn('请先登录','EVAL');
        }
        else if($heraldSession->getUserType() != 1 )
        {
            $this->ajaxReturn('请以个人用户登录','EVAL');
        }
        else
        {
            $uid = $heraldSession->getUserID();
            $result=$voteItem->voteIt(intval($itemid),$uid);
            //todo deal with result
            if($result==1)
            {
                $this->success('投票成功');
            }
            else
            {
                $message = array(
                  -1=>'已经投过',
                  -2=>'超过票数限制',
                  -3=>'选项不存在',
                  -4=>'已过期',
                  -5=>'投票不存在',
                  -6=>'写入数据库错误',
                );
                $this->ajaxReturn($message[$result],'EVAL');
            }
        }
    }
}