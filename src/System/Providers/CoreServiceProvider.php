<?php
namespace Core\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Core\Providers\Accessor\CoreAccessor;

class CoreServiceProvider extends CoreAccessor {

  public function map( $core ) {
    /*
		*  INIT MAP
		*  Niveles de ejecución del registro
		* -----------------------------------------------------------------
		* [0] => CORE | [1] => LIBRARIES | [2] => PACKAGES | [3] => PLUGINS
		* -----------------------------------------------------------------
		*/

		/*
		* [0] => CORE */
		$this->app["core"]->mount("core");

		/*
		* [1] => LIBRARIES */
		$this->app["core"]->mount("library");

		/*
		* [2] => PACKAGES */
		$this->app["core"]->mount("package");

		/*
		* [3] => PLUGINS */
		$this->app["core"]->mount("plugin");

      //dd($this->app["core"]->load("loader"));
  }
}
