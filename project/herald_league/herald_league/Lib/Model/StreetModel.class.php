<?php
/*

*名称：社团街道模型类

*功能: 获取街道信息

*作者：Tairy

*更新日期：2013/1/17

*/

class StreetModel extends Model
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

    函数功能：获取街道信息
    
    参数信息：包含社团类别的数组

      返回值：返回每一个类型下的街道
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */
    public function getStreerInfo( $leagueclass )
    {
    	$street = $this -> where('league_class ='.$leagueclass) -> select();
    	return $street;
    }

    /*

    函数功能：获取当前街道下的社团列表
    
    参数信息：包含街道信息的数组

      返回值：返回包含当前社团对应的所有活动信息的二维数组
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */

    public function getLeagueListOfStreet ( $street )
    {	
    	$League = D("LeagueInfo");

    	foreach ( $street as $streets ) 
    	{
    		$league[$streets['id']] = $League -> where( 'street_id = '.$streets['id'] ) -> select();
    	}
    	return $league;
    }
}
?>