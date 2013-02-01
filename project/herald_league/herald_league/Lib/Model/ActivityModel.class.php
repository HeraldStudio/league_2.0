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
    /*

    函数功能：根据id获取活动信息
    
    参数信息：活动id

      返回值：返回包含当前社团对应的所有活动信息的二维数组
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */
    public function getActivityInfoById( $activityid )
    {
        $activity = $this -> where( 'id ='.$activityid ) -> select();
        return $activity;
    }

    public function getAttender( $activityID )
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
        if($attentionInf == false || $attentionInf == null)//查询失败
        {
            return null;
        }
        $user = M('user');
        foreach($attentionInf as $n => $u)
        {
            $userInf = $user->find($u['user_id']);
            // $attender[$n]['id']=$u['user_id'];
            // $attender[$n]['nick_name'] = $userInf['nick_name'];
            // $attender[$n]['user_avatar_add'] = $userInf['user_avatar_add'];
            $attender[$n]=$userInf;
        }
        return $attender;
    }

    public function getClass( $activityID )
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
        $classInf = $class_activity->where(array('activity_id'=>$activityID))->select();
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

    /*
     * 功能：获取最近的活动
     * 输入：数量限制
     * 返回: 二维数组，每一个元素都是活动各项信息的数组
     * 作者：xie
     * 日期：2013.1.26
     */
    public function recent($limit)
    {
       $map['end_time']=array('egt',date('Y-m-d'));
       return $this->where($map)->order('start_time')->limit($limit)->select();
    }

    /*
     * 功能：判断活动是否存在
     * 输入：id
     * 返回: true/false
     * 作者：xie
     * 日期：2013.1.26
     */
    public function isexist($activityid)
    {
        if($this->find($activityid));
            return true;
        return false;
    }
    /*
     * 功能：获取热门活动
     * 输入：个数限制，默认为6
     * 返回: 二维数组，每一个元素都是活动的名称，id
     * 作者：xie
     * 日期：2013.1.29
     */
    public function getHeatActivity($limit=6)
    {
        $date=date("Y-m-d");
        return $this->where(array('end_time'=>array('egt',$date)))->order('activity_count desc')->limit($limit)->field('id,activity_name')->select();
    }
    /*
     * 功能：获取指定数量的活动
     * 输入：个数限制
     * 返回: 二维数组，每一个元素都是活动的名称，id,海报
     * 作者：xie
     * 日期：2013.1.29
     */
    public function getActivitybyLimit($limit=10)
    {
        return $this->order('start_time desc')->limit($limit)->field('id,activity_name,activity_post_add')->select();
    }
}