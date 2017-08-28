<?php
	$TEMPLATE['display.aartist'] = true;
	if( isset($_POST['subcommand']) ){switch($_POST['subcommand']){
		case 'artist.save':
			if( empty($_POST['_id']) ){unset($_POST['_id']);}
			$artists_TB = new artists_TB();
			$artistOB = $_POST;
			$artists_TB->save($artistOB);
			common_r();
		case 'artist.remove':
			if( empty($_POST['_id']) ){common_r();}
			$artists_TB = new artists_TB();
			$artists_TB->removeByID($_POST['_id']);
			common_r();
	}}


	function artist_main(){
		global $TEMPLATE;
		$artists_TB = new artists_TB();

		$clause = [];
		$itemsPerPage = 50;
		$limit    = ( ( $GLOBALS['w.page'] - 1 ) * $itemsPerPage ).','.$itemsPerPage;
		$artistOBs = $artists_TB->getWhere($clause,['limit'=>$limit,'order'=>'_id DESC']);

		foreach( $artistOBs as &$artistOB ){
			$artistOB['url.artist.profile'] = presentation_artist_profile($artistOB);
		}
		unset($artistOB);
		
		$TEMPLATE['artistOBs'] = $artistOBs;
		$TEMPLATE['PAGE.TITLE'] = 'Artists';
		return common_renderTemplate('artist/main');
	}

	function _artist_profile(&$artistOB = []){
		$artistOB['src.artist.64'] = presentation_default_avatar();
		$artistOB['url.artist.profile'] = presentation_artist_profile($artistOB);
		$artistOB['url.artist.bands'] = presentation_artist_bands($artistOB);
	}

	function artist_profile($id = false){
		global $TEMPLATE;
		$artists_TB = new artists_TB();
		if( !($artistOB = $artists_TB->getByID($id)) ){common_r('',404);}


		_artist_profile($artistOB);
		$TEMPLATE['tab.profile'] = true;
		$TEMPLATE['artistOB'] = $artistOB;
		$TEMPLATE['PAGE.TITLE'] = $artistOB['artistName'];
		return common_renderTemplate('artist/profile');
	}

	function artist_bands($id = false){
		global $TEMPLATE;
		$artists_TB = new artists_TB();
		if( !($artistOB = $artists_TB->getByID($id)) ){common_r('',404);}
		$rels_bands_artists_TB = new rels_bands_artists_TB();


		$query = 'select b.* from bands b, rels_bands_artists r where r.relBand = b._id and r.relArtist = '.$id;
		$bandsOBs = $rels_bands_artists_TB->_exec($query);
		$TEMPLATE['bandsOBs'] = $bandsOBs;


		_artist_profile($artistOB);
		$TEMPLATE['tab.bands'] = true;
		$TEMPLATE['artistOB'] = $artistOB;
		$TEMPLATE['PAGE.TITLE'] = $artistOB['artistName'];
		return common_renderTemplate('artist/bands');
	}
