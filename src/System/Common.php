<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

/* CORE FACADE */
$this->app->bind( "Core", function($app) {
	return new \Core\Support\Core(
		new \Core\Support\Bootstrap($app)
	);
});

$this->app["core"] = Core::load();

if(!function_exists("core")) {
   function core( $key=null ) {
      return Core::load($key);
   }
}

/*
* LOCAL LIBRARIES */
Core::load( "finder", new \Core\Support\Finder );
Core::load( "loader", new \Core\Support\Loader($this->app) );
Core::load( "coredb", new \Core\Support\StorDB( $this->app["db"] ) );
Core::load( "urls", new \Core\Support\Urls($this->app) );

/*
* HELPERS */
if( !function_exists("__path") ) {
   function __path($key=null) {
      return core("urls")->path($key);
   }
}

if( !function_exists("__url") ) {
   function __url($uri=null, $parameters=[], $secure=null ) {
      return core("urls")->url($uri, $parameters, $secure);
   }
}

if(!function_exists("__segments")) {
	function __segments() {
		return request()->segments();
	}
}

if( !function_exists("__segment") ) {
   function __segment( $index=1, $match=null ) {

      $segment = request()->segment($index);

      if( !is_null($match) ) {
         return ($segment == $match);
      }

      return $segment;
   }
}

/*
* Urls etiquetadas */
Core::addUrl([
   "__base"    => Core::load("urls")->baseDir(),
   "__cdn/"    => "__base/cdn/",
]);


/*
* Rutas etiquetadas */
Core::addPath([
   "__base"          => core("urls")->baseDir(),
   "__core"          => realpath(__DIR__."/../"),
   "__cdn"           => public_path("__base/cdn/"),
   "__localmodule"   => realpath(__DIR__."/../../../")."/",
   "__locale"        => "__core/Http/Locale/"
]);

/*
* Iniitialze Core */
Core::mount(\Core\Info::class);
