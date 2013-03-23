<?php
/**
* 
*/
class LeaguePictureModel extends Model
{
	public function getLeagueId( $pictureid )
	{
		return $this -> getFieldById($pictureid,'league_id');
	}
	public function getLeaguePictureName($pictureid)
	{
		return $this -> getFieldById($pictureid,'picture_name');
	}
}

?>