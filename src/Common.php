<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

define("__RLINARESDEV__", realpath(__DIR__."/../../")."/");
define("__CORE__", realpath(__DIR__."/")."/");

$this->app->bind( "Core", function($app) {
	return new \Core\Support\Core(
		new \Core\Support\Bootstrap($app)
	);
});

$this->app["core"] = Core::load();

Core::load( "finder", new \Core\Support\Finder );
Core::load( "loader", new \Core\Support\Loader($this->app) );
Core::load( "coredb", new \Core\Support\StorDB( $this->app["db"] ) );
Core::load( "urls", new \Core\Support\Urls($this->app) );



// if( Core::hasModule("hydra") ) {
// 	Core::load("local")->start();
// }
