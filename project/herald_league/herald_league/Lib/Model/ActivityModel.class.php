<?php
/*

*名称：ActivityModel.class.php

*功能: 信息模块类文件

*作者：Tairy

*更新日期：2013/1/17

*/
class ActivityModel extends Model
{
	// 定义自动验证
    protected $_validate = array(
        //array('content','require','内容必须'),
        );
    // 定义自动完成
    protected $_auto = array(
       // array('content','htmlencode',3,'function'),
        );

    /*

	函数功能：获取当前社团对应的所有活动
	
	参数信息：社团的id

	  返回值：返回包含当前社团对应的所有活动信息的二维数组
			  
	    作者：Tairy
	
	更新日期：2013/01/17
	
	*/

    public function getActivityInfoByLeague ( $leagueid )
    {
    	$activity = $this -> where( 'league_id ='.$leagueid ) -> select();
    	return $activity;
    }

    public function getAttender($activityID)
    {
    /*
     * 功能        获取关注者
     * 修改日期   2013.1.22
     *作者        xie
     * 参数      活动的id
     * 返回值    一个二维数组，每个元素里面包含昵称和头像
     */

        $attention = M('attention');
        $attentionInf = $attention ->where(array('attended_id'=>$activityID,'isleague'=>0))->select();
        if($attentionInf == false ||$attentionInf == null)//查询失败
        {
            return null;
        }
        $user = M('user');
        foreach($attentionInf as $n => $u)
        {
            $userInf = $user->find($u['user_id']);
            $attender[$n]['name'] = $userInf['nick_name'];
            $attender[$n]['avatar'] = $userInf['user_avatar_add'];
        }
        return $attender;
        }
    public function getClass($activityID)
    {
        /*
         * 功能：得到活动标签
         * 日期:2013.1.21
         * 作者: xie
         * 参数 活动的id
         * 返回值：一个标签的数组
         */
        $class_activity = M('class_activity');
        $activity_class = M('activity_class');
        $classInf = $class_activity->where(array('activityid'=>$activityID))->select();
        if($classInf == null  || $classInf ==false)
        {
            return null;
        }
        foreach ($classInf as $n=>$c)
        {
            $tag = $activity_class->find($c['class_id']);
            $activity[$n]=$tag['class_name'];
        }
        return $activity;
    }
}