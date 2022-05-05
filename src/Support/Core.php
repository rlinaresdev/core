<?php
namespace Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Core\Support\Bootstrap;

class Core {

	protected static $app;

	public function __construct( Bootstrap $app ) {
		self::$app = $app;
	}

	public function load( $key=NULL, $args=[], $params=[] ) {
		return self::$app->load( $this, $key, $args, $params );
	}

	public function hasModule($slug=null, $path=__RLINARESDEV__) {
		return in_array($slug, $this->load("finder")->map($path));
	}

	/*
	* LANGUAGE */
	public function loadGrammars() {
		$this->load("locale")->loadGrammars();
	}

	/*
	* URLS */
	public function publicUrl($path=null, $parameters=[], $secure=null ) {
		return $this->load("url")->url($path, $parameters, $secure);
	}

	public function addTagUrl($taggs=[]) {
		return $this->load("urls")->addTag("urls", $taggs);
	}

	/*
	* PATH */
	public function path($path=null) {
		return $this->load("urls")->path($path);
	}

	public function addTagPath($taggs=[]) {
		return $this->load("urls")->addTag("paths", $taggs);
	}

	/*
	* FINDER */
	public function find($source, $segment=1) {
		return $this->load("finder")->map($source, $segment);
	}

	/*
	* VALIDATION */
	public function isAppStart( $type=null, $slug=null ) {
		return $this->load("loader")->isAppStart($type, $slug);
	}

	public function stable() {
		return $this->isAppStart("core", "core");
	}

}
