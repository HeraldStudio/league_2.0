
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
        array('verfyCode','checkVerfyCode','验证码错误',1,'callback'),
        array('activity_name','require','活动名称必须填写'),
        array('activity_introduce','require','活动简介必须填写'),
        array('start_time','checkStartTime','开始时间无效',1,'callback',1),
        array('end_time','checkEndTime','结束时间无效',1,'callback',1),
        array('is_vote',array(0,1),'请选择是否为投票',2,'in'),
        array('activity_place','require','活动地点必须填写'),
        );
    protected function checkStartTime($time) //判断开始时间是否早于今天
    {
        import('ORG.Util.Date');
        $today = new Date(date('Y-m-d'));
        trace('d',$today->dateDiff($time));
        if($today->dateDiff($time) > 0)
            return true;
        return false;
    }
    protected function checkEndTime($time)//判断结束时间是否不小于开始时间
    {
        import('ORG.Util.Date');
        $start_time= new Date($this->data['start_time']);
        if($start_time->dateDiff($time)>0)
            return true;
        return false;
    }
    protected function checkVerfyCode($code)
    {
        trace('ver',$_SESSION['verfy']);
        trace('code',md5(strtolower($code)));
        if($_SESSION['verfy']==md5(strtolower($code)))
            return true;
        return false;
    }
    // 定义自动完成
    protected $_auto = array(
        array('league_id',1,'intval'),
        array('activity_name','htmlencode',1,'function'),
        array('activity_introduce','htmlencode',1,'function'),
        array('start_time','htmlencode',1,'function'),
        array('end_time','htmlencode',1,'function'),
        array('activity_org_name','htmlencode',1,'function'),
        array('activity_place','htmlencode',1,'function'),
        array('contact_info','htmlencode',1,'function'),
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