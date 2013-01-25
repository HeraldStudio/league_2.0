<?php
class AttentionModel extends Model
{
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
}

?>