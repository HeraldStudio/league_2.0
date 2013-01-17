<?php
/*

*名称：LeagueInfoModel.class.php

*功能: 社团信息模型类

*作者：Tairy

*更新日期：2013/1/17

*/
class LeagueInfoModel extends Model
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

	函数功能：返回当前社团信息
	
	参数信息：社团的id

	  返回值：返回包含当前社团的所有信息的数组
			  
	    作者：Tairy
	
	更新日期：2013/01/17
	
	*/

    public function getLeagueInfo ( $leagueid )
    {
		$league = $this -> where( 'id ='.$leagueid ) -> select();
		return $league;
    }

    /*

	函数功能：获取当前社团的类别名称
	
	参数信息：社团类别的id

	  返回值：返回社团类别名称
			  
	    作者：Tairy
	
	更新日期：2013/01/17
	
	*/

    public function getClassName ( $classid )
    {
    	$Class = M("LeagueClass");
    	$classname = $Class -> getFieldById ( $classid, 'class_name' );
    	return $classname;
    }

    /*

	函数功能：获取当前社团的街道名称
	
	参数信息：社团街道的id

	  返回值：返回社团类别名称
			  
	    作者：Tairy
	
	更新日期：2013/01/17
	
	*/

    public function getStreetName ( $streetid )
    {
    	$Street = M("Street");
    	$streetname = $Street -> getFieldById ( $streetid, 'street_name');
    	return $streetname;
    }
}
?>