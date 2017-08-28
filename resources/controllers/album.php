<?php
	$TEMPLATE['display.aalbums'] = true;
	if( isset($_POST['subcommand']) ){switch($_POST['subcommand']){
		case 'album.save':
			if( empty($_POST['_id']) ){unset($_POST['_id']);}
			$albums_TB = new albums_TB();
			$albumOB = $_POST;
			$albums_TB->save($albumOB);
			common_r();
		case 'album.remove':
			if( empty($_POST['_id']) ){common_r();}
			$albums_TB = new albums_TB();
			$albums_TB->removeByID($_POST['_id']);
			common_r();
	}}

	function album_main(){
		global $TEMPLATE;
		$albums_TB = new albums_TB();

		$clause = [];
		$itemsPerPage = 50;
		$limit    = ( ( $GLOBALS['w.page'] - 1 ) * $itemsPerPage ).','.$itemsPerPage;
		$albumOBs = $albums_TB->getWhere($clause,['limit'=>$limit,'order'=>'_id DESC']);

		foreach( $albumOBs as &$albumOB ){
			$albumOB['url.album.profile'] = presentation_album_profile($albumOB);
		}
		unset($albumOB);
		
		$TEMPLATE['albumOBs'] = $albumOBs;
		$TEMPLATE['PAGE.TITLE'] = 'Albums';
		return common_renderTemplate('album/main');
	}

	function _album_profile(&$albumOB){
		$albumOB['src.album.64']      = presentation_default_avatar();
		$albumOB['url.album.profile'] = presentation_album_profile($albumOB);
		$albumOB['url.album.members'] = presentation_album_members($albumOB);
	}

	function album_profile($id = false){
		global $TEMPLATE;
		$albums_TB = new albums_TB();
		if( !($albumOB = $albums_TB->getByID($id)) ){common_r('',404);}

		_album_profile($albumOB);
		$TEMPLATE['tab.profile'] = true;
		$TEMPLATE['albumOB'] = $albumOB;
		$TEMPLATE['PAGE.TITLE'] = $albumOB['albumName'];
		return common_renderTemplate('album/profile');
	}

	function album_members($id = false){
		global $TEMPLATE;
		$albums_TB = new albums_TB();
		if( !($albumOB = $albums_TB->getByID($id)) ){common_r('',404);}
		$artists_TB = new artists_TB();
		$rels_albums_artists_TB = new rels_albums_artists_TB();

		if( isset($_POST['subcommand']) ){switch($_POST['subcommand']){
			case 'album.member.add':
				if( empty($_POST['_id']) || empty($_POST['_artist']) ){common_r();}
				if( !($artistOB = $artists_TB->getByID($_POST['_artist'])) ){common_r();}
				$albums_TB->artist_add($albumOB,$artistOB);
				common_r();
			case 'album.member.remove':
				if( empty($_POST['_id']) || empty($_POST['_artist']) ){common_r();}
				if( !($artistOB = $artists_TB->getByID($_POST['_artist'])) ){common_r();}
				$albums_TB->artist_remove($albumOB,$artistOB);
				common_r();
		}}


		$query = 'select a.* from artists a where a._id not in (select r.relArtist from rels_albums_artists r where r.relAlbum = '.$id.')';
		$select_artistOBs = $rels_albums_artists_TB->_exec($query);
		if( empty($select_artistOBs) ){
			$select_artistOBs = $artists_TB->getWhere();
		}
		$TEMPLATE['select_artistOBs'] = $select_artistOBs;


		$query = 'select a.* from artists a, rels_albums_artists r where r.relArtist = a._id and r.relAlbum = '.$id;
		$artistOBs = $rels_albums_artists_TB->_exec($query);
		$TEMPLATE['artistOBs'] = $artistOBs;


		_album_profile($albumOB);
		$TEMPLATE['tab.members'] = true;
		$TEMPLATE['albumOB'] = $albumOB;
		$TEMPLATE['PAGE.TITLE'] = 'Members of '.$albumOB['albumName'];
		return common_renderTemplate('album/members');
	}
