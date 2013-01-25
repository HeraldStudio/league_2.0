<?php
class Search
{
	public function getSearchResult( $keyword )
	{
		$Album = D('LeagueAlbum');
		$Activity = D('Activity');
		$League = D('LeagueInfo');
		$Picture = D('LeaguePicture');
		$User = D('User');
		$album['album_name'] = array('like','%'.$keyword.'%');
		$activity['activity_name'] = array('like', '%'.$keyword.'%');
		$league['league_name'] = array('like', '%'.$keyword.'%');
		$picture['picture_name'] = array('like', '%'.$keyword.'%');
		$user['true_name'] = array('like', '%'.$keyword.'%');
		
		$result['album'] = $Album -> where($album)-> select();
		$result['activity'] = $Activity -> where($activity) -> select();
		$result['league'] = $League -> where($league) ->select();
		$result['picture'] = $Picture -> where($picture) -> select();
		$result['user'] = $User -> where($user) -> select(); 
		return $result;
	}
}
?>