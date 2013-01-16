<?php
/*

*名称：活动信息页

*功能: 展示活动信息

*作者：xie

*更新日期：2013.1.9

*/
class ActivityAction extends Action
{
    public function index()
    {
       // $heraldSession = D('UserSessionControl'); //控制会话
        $activityID =intval( $this ->_param('activityid') ); //获取url参数
        $activity = M('activity');
        $result = $activity->where("id=%d",$activityID)->find(); //查询，find（）只返回第一条
        if($result = null || $result = false)  //找不到 或者 查询失败
        {
            //todo show error message
            echo "ERROR";
        }
        else
        {
            //TODO show the message
            //$this->assign("result",$result);
        }
    }
}