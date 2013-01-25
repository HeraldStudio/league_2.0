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

    函数功能：获取当前用户与当前社团的关注状态
    
    参数信息：用户的id

      返回值：关注返回true 未关注返回false

        作者：Tairy
    
    更新日期：2013/01/17
    
    */

    public function getAttentionState( $data )
    {
        if( $this -> select( $data ))
            return ture;
        else
            return false;
    }

    /*

    函数功能：改变关注状态函数
    
    参数信息：社团的id

      返回值：返回数据改变结果
              
        作者：Tairy
    
    更新日期：2013/01/17
    
    */

    public function changeAttention($data,$action = 'add')
    {
        switch ($action)
        {
            case 'add':
                if( $this -> select( $data ) )
                    return '你已经关注';
                else
                {
                    if($this->add($data))
                    {
                        return '关注成功';
                    }
                    else
                    {
                        return '关注失败';
                    }

                }
                break;
            case 'del':
                if( $this -> select($data) )
                {
                    if($this->delete($data))
                        return '取消关注成功';
                    else
                        return '取消关注失败';
                }
                else
                {
                    return '你还未关注';
                }
            default:
                {
                    return '非法的操作';                
                }
        }

    }
}
?>