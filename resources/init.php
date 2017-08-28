<?php
	if( $GLOBALS['w.localhost'] ){ini_set('display_errors',1);}
	date_default_timezone_set('Europe/Madrid');

	include_once('inc.common.php');
	common_setBase('base');
	if( !function_exists('mb_strlen') ){echo 'Please install php-mbstring'.PHP_EOL;exit;}

	function __autoload( $name ){
		switch( $name ){
			/* INI-Databases */
			case '_mongo':
			case '_mongodb':
				if( class_exists('MongoId') ){include('classes/class._mongo.php');break;}
				include('classes/class._mongodb.php');break;
			case '_sqlite3':
				if( !class_exists('SQLite3') ){echo 'Please install php-sqlite3'.PHP_EOL;exit;}
				include('classes/class._sqlite3.php');break;
			case '_mysql':		include('classes/class._mysql.php');break;
			/* END-Databases */

			case  '_html_fileg':
			case '__html_fileg':	include('classes/class._html_fileg.php');break;
			case '__strings':	include('inc.strings.php');break;
			case  '_date':
			case '__date':		include('classes/class._date.php');break;
			case  '_params':	include('classes/class._params.php');break;

			case '_shoutbox_sqlite3':	include('classes/class._shoutbox.sqlite3.php');break;

			case 'bands_TB':
			case 'artists_TB':
			case 'albums_TB':
			case 'rels_bands_artists_TB':
			case 'rels_albums_artists_TB':
							include('api.music.php');break;
				
		}
	}


	function presentation_default_avatar(){return $GLOBALS['w.indexURL'].'/images/avatar';}

	function presentation_band_main(){return $GLOBALS['w.indexURL'].'/band';}
	function presentation_band_profile($bandOB){return $GLOBALS['w.indexURL'].'/band/profile/'.$bandOB['_id'];}
	function presentation_band_members($bandOB){return $GLOBALS['w.indexURL'].'/band/members/'.$bandOB['_id'];}

	function presentation_album_main(){return $GLOBALS['w.indexURL'].'/album';}
	function presentation_album_profile($albumOB){return $GLOBALS['w.indexURL'].'/album/profile/'.$albumOB['_id'];}
	function presentation_album_members($albumOB){return $GLOBALS['w.indexURL'].'/album/members/'.$albumOB['_id'];}

	function presentation_artist_main(){return $GLOBALS['w.indexURL'].'/artist';}
	function presentation_artist_profile($artistOB){return $GLOBALS['w.indexURL'].'/artist/profile/'.$artistOB['_id'];}
	function presentation_artist_bands($artistOB){return $GLOBALS['w.indexURL'].'/artist/bands/'.$artistOB['_id'];}
