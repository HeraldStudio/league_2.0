<?php
/**
 * User: xie & Tairy
 * Date: 13-1-25
 * 功能：关注模型
 */
class AttentionModel extends Model
{
    protected $_validate = array(
        array('user_id','number','用户无效'),
        array('activity_id','number','活动无效'),
        array('isleague',array(0,1),'信息无效'),
    );

    /*

    函数功能：获取用户关注的社团信息
    
    参数信息：用户的id

      返回值：返回包含当前社团对应的所有社团信息的二维数组
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */

    public function getAttentionLeague ( $userid )
    {
        $attentionleague = $this -> where('user_id = '.$userid.' AND isleague = 1') -> select();
        return $attentionleague;
    }

    /*

    函数功能：获取用户关注的活动信息
    
    参数信息：用户的id

      返回值：返回包含当前社团对应的所有活动信息的二维数组
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */
    public function getAttentionActivity ( $userid )
    {
        $attentionactivity = $this -> where('user_id = '.$userid.' AND isleague = 0') -> select();
        return $attentionactivity;
    }

    /*

    函数功能：获取当前用户与当前社团或者活动的关注状态
    
    参数信息：用户的id

      返回值：关注返回true 未关注返回false

        作者：Tairy & xie
    
    更新日期：2013/01/17
    
    */

    public function getAttentionState( $data )
    {

        if( $this -> where($data)->select( ))
            return true;

        else
            return false;
    }

    /*

    函数功能：改变关注状态函数
    
    参数信息：数组，包括活动/社团的id，关注着的id，是否为社团

      返回值：返回数据改变结果
             1：关注成功
             2: 取消关注成功
            -1：已经关注
            -2：关注失败
            -3: 还未关注，无法取消
            -4: 取消关注失败
            -5: 非法的操作
              
        作者：Tairy & xie
    
    更新日期：2013/02/1
    
    */

    public function changeAttention($data,$action = 'add')
    {
        switch ($action)
        {
            case 'add':
                if( $this -> where( $data )->find() )
                    return -1;
                else
                {
                    if($this->add($data))
                    {
                        if($data->isleague==1)//关注社团时增加社团热度
                        {
                            $leagueInfo = D('leagueInfo');
                            if($leagueInfo->where(array('id'=>$data->id))->setInc('heat',1))
                                return 1;
                            else
                                return -2;
                        }
                        return 1;
                    }
                    else
                    {
                        return -2;
                    }

                }
                break;
            case 'del':
                if( $this -> where($data)->find() )
                {
                    if($this->where($data)->delete())
                    {
                       if($data->isleague==1)//取消关注社团时减小热度
                       {
                            $leagueInfo = D('leagueInfo');
                            if($leagueInfo->where(array('id'=>$data->id))->setDec('heat',1))
                                return 2;
                            else
                                return -4;
                       }
                       return 2;
                    }                    
                    else
                        return -4;
                }
                else
                {
                    return -3;
                }
            default:
                {
                    return -5;
                }
        }

    }
    /*

    函数功能：获取当前用户与当前社团的关注状态
    
    参数信息：用户的id

      返回值：关注返回true 未关注返回false

        作者： xie
    
    更新日期：2013/01/17
    
    */
    public function getLeagueAttention( $leagueid )
    {
        return $this -> where ('attended_id = '.$leagueid. ' AND isleague = 1') -> select();
    }

    public function getActivityAttention( $activityid )
    {
        return $this -> where ('attended_id = '.$activityid. ' AND isleague = 0') -> select();
    }
}
