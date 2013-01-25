<?php
/**
 * User: xie
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
    public function getAttentionLeague ( $userid )
    {
        $attentionleague = $this -> where('user_id = '.$userid.' AND isleague = 1') -> select();
        return $attentionleague;
    }

    public function getAttentionActivity ( $userid )
    {
        $attentionactivity = $this -> where('user_id = '.$userid.' AND isleague = 0') -> select();
        return $attentionactivity;
    }
    public function changeAttention($data,$action = 'add')
    {
        switch ($action)
        {
            case 'add':
                if($this->where($data)->select())
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
                if($this->select($data))
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