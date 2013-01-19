<?php
/*

*名称：活动信息页

*功能: 展示活动信息

*作者：xie

*更新日期：2013.1.18

*/
class ActivityAction extends Action
{
    public function index()
    {

       // $heraldSession = D('UserSessionControl'); //控制会话
        $activityID =intval( $this ->_param('activityid') ); //获取url参数
        $activity = M('activity');
        //$result = $activity->where("id=%d",$activityID)->find(); //查询，find（）只返回第一条
        $result = $activity->find($activityID); //读取主键为$activityID值的数据
        if($result == null || $result == false)  //找不到 或者 查询失败
        {
            // echo "ERROR";
            display('error');
        }
        else
        {
            //var_dump($result);
            if($result[is_vote] != 0 )//是投票
            {
                redirect("../../../Vote/index/voteid/$result[id]");//  转向投票页
            }
            else
            {
               foreach ($result as $value) 
               {
                   $value = htmlspecialchars($value); //转义，防止XSS
               }
               $this->assign('result',$result);
               $this ->display();
            }

        }
    }
}