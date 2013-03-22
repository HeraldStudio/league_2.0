<?php
class LeagueAlbumModel extends Model
{
	public function getLeagueId($albumid)
	{
		return $this -> getFieldById($albumid,'league_id');
	}
	public function getLeagueAlbumName($albumid)
	{
		return $this -> getFieldById($albumid,'album_name');
	}

}
?>