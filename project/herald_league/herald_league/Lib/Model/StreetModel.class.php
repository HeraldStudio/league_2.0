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
    public function getStreerInfo( $leagueclass )
    {
    	$street = $this -> where('league_class ='.$leagueclass) -> select();
    	return $street;
    }
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