<?php
	date_default_timezone_set('Europe/Madrid');

	/* INI-tables */
	$GLOBALS['api']['sqlite3']['tables']['bands'] = [
		 '_id'=>'INTEGER AUTOINCREMENT'
		,'bandName'=>'TEXT'
		,'bandNameFixed'=>'TEXT'
		,'bandDescription'=>'TEXT'
		,'bandTags'=>'TEXT'
		,'bandCreationStamp'=>'INTEGER'
	];
	/* END-tables */
	class bands_TB extends _sqlite3{
		public $table   = 'bands';
		public $search_fields = ['bandName'];
		function validate(&$data = [],&$oldData = []){
			include_once('inc.strings.php');
			if( !isset($data['bandNameFixed']) && isset($data['bandName']) ){$data['bandNameFixed'] = strings_toURL($data['bandName']);}

			if( isset($data['bandTags']) ){
				if( is_string($data['bandTags']) ){
					$data['bandTags'] = explode(',',$data['bandTags']);
					$data['bandTags'] = array_filter($data['bandTags']);
					$data['bandTags'] = array_unique($data['bandTags']);
				}
				if( is_array($data['bandTags']) ){
					$data['bandTags'] = ','.implode(',',$data['bandTags']).',';
				}
			}
			if( empty($data['bandCreationStamp']) ){$data['bandCreationStamp'] = time();}
			return $data;
		}
		function artist_add($bandOB,$artistOB){
			/* Add artist to this band */
			if( empty($this->rels_bands_artists_TB) ){$this->rels_bands_artists_TB = new rels_bands_artists_TB();}
			$relOB = [
				 'relBand'=>$bandOB['_id']
				,'relArtist'=>$artistOB['_id']
			];
			$this->rels_bands_artists_TB->save($relOB);
			return true;
		}
		function artist_remove($bandOB,$artistOB){
			/* Remove artist from this band */
			if( empty($this->rels_bands_artists_TB) ){$this->rels_bands_artists_TB = new rels_bands_artists_TB();}
			$clause = [
				 'relBand'=>$bandOB['_id']
				,'relArtist'=>$artistOB['_id']
			];
			$this->rels_bands_artists_TB->removeWhere($clause);
			return true;
		}
	}

	/* INI-relations band - artist */
	$GLOBALS['api']['sqlite3']['tables']['rels_bands_artists'] = [
		 '_id'=>'INTEGER AUTOINCREMENT'
		,'relBand'=>'TEXT'
		,'relArtist'=>'TEXT'
	];
	class rels_bands_artists_TB extends _sqlite3{
		public $table = 'rels_bands_artists';
	}
	/* END-relations band - artist */

	/* INI-tables */
	$GLOBALS['api']['sqlite3']['tables']['artists'] = [
		 '_id'=>'INTEGER AUTOINCREMENT'
		,'artistName'=>'TEXT'
		,'artistDescription'=>'TEXT'
		,'artistTags'=>'TEXT'
		,'artistInstrument'=>'TEXT'
	];
	$GLOBALS['api']['sqlite3']['indexes']['artists'] = [

	];
	/* END-tables */
	class artists_TB extends _sqlite3{
		public $table   = 'artists';
		public $search_fields = ['artistName'];
		function validate(&$data = [],&$oldData = []){
			return $data;
		}
	}

	/* INI-mongo tables */
	$GLOBALS['api']['sqlite3']['tables']['albums'] = [
		 '_id'=>'INTEGER AUTOINCREMENT'
		,'albumType'=>'TEXT'
		,'albumName'=>'TEXT'
		,'albumNameFixed'=>'TEXT'
		,'albumYear'=>'TEXT'
		,'albumPlays'=>'TEXT'
		,'albumCreationStamp'=>'TEXT'
		,'albumPublishDate'=>'TEXT'
	];
	$GLOBALS['api']['sqlite3']['indexes']['albums'] = [

	];
	/* END-mongo tables */
	class albums_TB extends _sqlite3{
		public $table   = 'albums';
		public $search_fields = ['albumName'];
		function validate(&$data = [],&$oldData = []){
			include_once('inc.strings.php');
			if( !isset($data['albumNameFixed']) && isset($data['albumName']) ){$data['albumNameFixed'] = strings_toURL($data['albumName']);}
			if(  isset($data['albumYear']) ){$data['albumYear'] = intval($data['albumYear']);}

			if( empty($data['albumCreationStamp']) ){$data['albumCreationStamp'] = time();}
			return $data;
		}
		function removeByID($id = false,$params = []){
			$this->_removeByID($id,$params);

			/* I had no time for foreign keys */
			if( empty($this->rels_albums_artists_TB) ){$this->rels_albums_artists_TB = new rels_albums_artists_TB();}
			$this->rels_albums_artists_TB->removeWhere(['relAlbum'=>$id]);
		}
		function artist_add($albumOB,$artistOB){
			/* Add artist to this album */
			if( empty($this->rels_albums_artists_TB) ){$this->rels_albums_artists_TB = new rels_albums_artists_TB();}
			$relOB = [
				 'relAlbum'=>$albumOB['_id']
				,'relArtist'=>$artistOB['_id']
			];
			$this->rels_albums_artists_TB->save($relOB);
			return true;
		}
		function artist_remove($albumOB,$artistOB){
			/* Remove artist from this album */
			if( empty($this->rels_albums_artists_TB) ){$this->rels_albums_artists_TB = new rels_albums_artists_TB();}
			$clause = [
				 'relAlbum'=>$albumOB['_id']
				,'relArtist'=>$artistOB['_id']
			];
			$this->rels_albums_artists_TB->removeWhere($clause);
			return true;
		}
	}

	/* INI-relations album - artist */
	$GLOBALS['api']['sqlite3']['tables']['rels_albums_artists'] = [
		 '_id'=>'INTEGER AUTOINCREMENT'
		,'relAlbum'=>'TEXT'
		,'relArtist'=>'TEXT'
	];
	class rels_albums_artists_TB extends _sqlite3{
		public $table = 'rels_albums_artists';
	}
	/* END-relations album - artist */


	class songs_TB extends _mongo{
		public $table   = 'songs';
		function validate(&$data = [],&$oldData = []){
			include_once('inc.strings.php');
			if( isset($data['songArtist']) ){unset($data['songArtist']);}
			if( isset($data['songAlbum']) ){unset($data['songAlbum']);}

			if( !isset($data['songTitleFixed']) && isset($data['songTitle']) ){$data['songTitleFixed'] = strings_toURL($data['songTitle']);}
			return $data;
		}
	}

