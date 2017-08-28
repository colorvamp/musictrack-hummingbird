<?php
	$TEMPLATE['display.aband'] = true;
	if( isset($_POST['subcommand']) ){switch($_POST['subcommand']){
		case 'band.save':
			if( empty($_POST['_id']) ){unset($_POST['_id']);}
			$bands_TB = new bands_TB();
			$bandOB = $_POST;
			$bands_TB->save($bandOB);
			common_r();
		case 'band.remove':
			if( empty($_POST['_id']) ){common_r();}
			$bands_TB = new bands_TB();
			$bands_TB->removeByID($_POST['_id']);
			common_r();
	}}

	function band_main(){
		global $TEMPLATE;
		$bands_TB = new bands_TB();

		$clause = [];
		$itemsPerPage = 50;
		$limit   = ( ( $GLOBALS['w.page'] - 1 ) * $itemsPerPage ).','.$itemsPerPage;
		$bandOBs = $bands_TB->getWhere($clause,['limit'=>$limit,'order'=>'_id DESC']);

		foreach( $bandOBs as &$bandOB ){
			$bandOB['url.band.profile'] = presentation_band_profile($bandOB);
		}
		unset($bandOB);
		
		$TEMPLATE['bandOBs'] = $bandOBs;
		$TEMPLATE['PAGE.TITLE'] = 'Band';
		return common_renderTemplate('band/main');
	}

	function _band_profile(&$bandOB = []){
		$bandOB['src.band.64']      = presentation_default_avatar();
		$bandOB['url.band.profile'] = presentation_band_profile($bandOB);
		$bandOB['url.band.members'] = presentation_band_members($bandOB);
	}

	function band_profile($id = false){
		global $TEMPLATE;
		$bands_TB = new bands_TB();
		if( !($bandOB = $bands_TB->getByID($id)) ){common_r('',404);}

		_band_profile($bandOB);
		$TEMPLATE['tab.profile'] = true;
		$TEMPLATE['bandOB'] = $bandOB;
		$TEMPLATE['PAGE.TITLE'] = $bandOB['bandName'];
		return common_renderTemplate('band/profile');
	}

	function band_members($id = false){
		global $TEMPLATE;

		$bands_TB = new bands_TB();
		if( !($bandOB = $bands_TB->getByID($id)) ){common_r('',404);}
		$rels_bands_artists_TB = new rels_bands_artists_TB();
		$artists_TB = new artists_TB();

		if( isset($_POST['subcommand']) ){switch($_POST['subcommand']){
			case 'band.member.add':
				if( empty($_POST['_id']) || empty($_POST['_artist']) ){common_r();}
				if( !($artistOB = $artists_TB->getByID($_POST['_artist'])) ){common_r();}
				$bands_TB->artist_add($bandOB,$artistOB);
				common_r();
		}}

		$query = 'select a.* from artists a where a._id not in (select r.relArtist from rels_bands_artists r where r.relBand = '.$id.')';
		$select_artistOBs = $rels_bands_artists_TB->_exec($query);
		if( !$select_artistOBs ){
			$select_artistOBs = $artists_TB->getWhere();
		}
		$TEMPLATE['select_artistOBs'] = $select_artistOBs;


		$query = 'select a.* from artists a, rels_bands_artists r where r.relArtist = a._id and r.relBand = '.$id;
		$artistOBs = $rels_bands_artists_TB->_exec($query);
		$TEMPLATE['artistOBs'] = $artistOBs;

		_band_profile($bandOB);
		$TEMPLATE['tab.members'] = true;
		$TEMPLATE['bandOB'] = $bandOB;
		$TEMPLATE['PAGE.TITLE'] = 'Members of '.$bandOB['bandName'];
		return common_renderTemplate('band/members');
	}
