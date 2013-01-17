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


}
?>