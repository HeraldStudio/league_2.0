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
        //array('username','htmlencode',3,'function'),
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
		$league = $this -> where( 'id ='.$leagueid ) -> find();
		return $league;
    }

     /*

    函数功能：获取社团头像地址
    
    参数信息：社团的id

      返回值：头像地址
              
        作者：Tairy
    
    更新日期：2013/02/17
    
    */

    public function getleagueAvaterAdd( $leagueid )
    {
        $avataradd = $this -> getFieldById( $leagueid, 'avater_address');
        return $avataradd;
    }
    /*

    函数功能：获取社团名称
    
    参数信息：社团的id

      返回值：社团名称
              
        作者：Tairy
    
    更新日期：2013/02/17
    
    */
    public function getleagueName( $leagueid )
    {
        $leaguename = $this -> getFieldById( $leagueid, 'league_name');
        return $leaguename;
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
    
    /*

	函数功能：添加新的社团
	
	参数信息：表单post上来的信息

	  返回值：无返回值
			  
	    作者：Tairy
	
	更新日期：2013/01/18
	
	*/

    public function addNewLeague ( $postdata )
    {
    	$newleagueinfo['username'] = $postdata['username'];
    	$newleagueinfo['password'] = $postdata['password'];
    	$newleagueinfo['comfirm_password'] = $postdata['comfirm_password'];
    	$newleagueinfo['league_name'] = $postdata['league_name'];
    	$newleagueinfo['league_introduce'] = $postdata['league_introduce'];

    	if( $this->create() ) 
		{
            return $this -> add( $newleagueinfo );
        }
        else
        {
            return "error";
        }
    }

    public function updateLeagueInfo ( $leagueid, $postdata )
    {
    	$updateleagueinfo['league_name'] = $postdata['league_name'];
    	$updateleagueinfo['league_introduce'] = $postdata['league_introduce'];
    	$updateleagueinfo['league_member'] = $postdata['league_member'];
    	$result = $this -> where ('id = '.$leagueid) -> save ( $updateleagueinfo );
    	return $result;
    }
    /*

    函数功能：返回热门社团
    参数信息：数量限制

      返回值：社团的数组，包括名称和id
              
        作者：xie
    
    更新日期：2013/01/31
    
    */
    public function getHeatLeague($limit=7)
    {
        return $this->where("league_name <> 'Null'" )->order('heat desc')->limit($limit)->field('league_name,id')->select();
    }
    /*
    *函数功能：社团登录
    *参数：用户名，密码
    *返回：成功返回社团的信息，失败返回null,
    *作者：xie
    */
    public function login($username,$password)
    {
        if($username==null || $password==null)
        {
            return null;
        }
        else
        {
            $condition['username']=htmlencode($username);
            $condition['password']=md5($password);
            $result=$this->where($condition)->find();
            if($result!=null && $result!=false)
            {
                $leagueID = $result['id'];
                $this->where('id=%d',$leagueID)->setField('last_login_time',date('Y-m-d'));
                return $result;
            }
            return null;
        }
    }

    /**判断活动是否存在
     * @return boolean
     * @param $leagueID
     */
    public function isexist($leagueID)
    {
        if($this->find($leagueID))
            return true;
        return false;
    }
    /**返回所有社团信息及坐标供地图使用
    *@return array
    */
    public function getAllLeague()
    {
        return $this->select();
    }

    /*返回新加入社团
    */
    public function getNewLeague()
    {
        return $this->field('id,league_name')->order('register_time desc')->where("league_name <> 'Null' ")->limit(30)->select();
    }
    /*根据类型返回社团
    */
    public function getLeagueByClass($class)
    {
        return $this->where(array('league_class'=>$class))->field('id,league_name,avater_address')->select();
    }

    public function getInterest()
    {
        $result =$this->field('id,league_name')->where("league_name <> 'Null' ")->select();
        shuffle($result);
        $r = array();
        for ($i=0; $i <5 && count($result)>0; $i++) { 
            $r[$i] = array_pop($result);
        }
        return $r;
    }
}
?>
