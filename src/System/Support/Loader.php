<?php
namespace Core\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/


use Illuminate\Foundation\AliasLoader;

class Loader {

	protected static $app;

   protected $modules = [
      "core"       => [],
      "library"    => [],
      "package"    => [],
   ];

	public function __construct( $app ) {
		self::$app = $app;
	}

   /*
   * VALIDATION */
	public function isAppStart( $type = null, $slug=null ) {
		if( (env("DB_HOST") == "127.0.0.1") && (env("DB_DATABASE") == "laravel") ) {
			return FALSE;
		}

		if( \Schema::hasTable( "apps" )) {

			if(self::$app["core"]->load("coredb")->has($type, $slug)) {
				return (self::$app["core"]->load("coredb")->get("core", "core")->activated == 1);
			}
		}
      
		return FALSE;
	}

   /*
   * MOUNTED */
   public function mount( $info ) {
      if( is_null($info) ) return null;

      $info       = $this->optimize($info);
      $app        = (object) $info->app();
      $credential = (object) $info->info();

      /*
      * ADD MODULES DRIVERS */
      $this->addModule( array_merge($info->info(), $info->app()) );

      /*
      * CONFIG */
      $this->mountConfig( $info );

      /*
      * KERNEL */
      $this->mountKernel( $app );
   }

   public function addModule( $app ) {
      if( array_key_exists(($app = (object) $app)->type, $this->modules) ) {
         $this->modules[$app->type][] = $app;
      }
   }

   public function mountConfig($info) {
      if( method_exists($info, "configs") ) {
         if( !empty( ($configs = $info->configs()) ) ) {
            foreach ($configs as $key => $value) {
               app("config")->set($key, $value);
            }
         }
      }
   }

   public function mountKernel( $app ) {
      if( isset($app->kernel) ) {
         $this->run($app->kernel);
      }
   }

   public function optimize($info) {
      if( is_object($info) ) {
         return $info;
      }

      if( is_string($info) ) {
         if( class_exists($info) ) {
            return new $info();
         }
      }

      abort(500, "Error Info Class", [
         "info"   => $info
      ]);
   }

	/*
	* ALIASES
	* Load Alias */
	public function loadAlias($alias=NULL) {

		if(!empty($alias) && is_array($alias)) {
			foreach ($alias as $alia => $class) {
				AliasLoader::getInstance()->alias($alia, $class);
			}
		}
	}

	/*
	* PROVIDERS
	* Load ServiceProvider */
	public function loadProviders($providers=[]) {
		if(empty($providers)) return NULL;

		if(!is_array($providers)) $providers = [$providers];

		foreach ($providers as $provider) {
			self::$app->register($provider);
		}
	}

	/*
	* KERNEL
	* Load Packages */
	public function run($kernel=NULL) {

		if( !empty($kernel) ) {

			$kernel = $this->optimize($kernel);

			## [0]
			if( method_exists($kernel, "handler") ) $kernel->handler( self::$app );

			## [1]
			if( method_exists($kernel, "providers") ) $this->loadProviders( $kernel->providers() );

			## [2]
			if( method_exists($kernel, "alias") ) $this->loadAlias( $kernel->alias() );

			return $kernel;
		}

		abort(500, "Error kernel packages");
	}

	public function register($type=null) {

		if( in_array($type, ["core", "library", "package", "plugin"]) ) {

			if( !empty( $stors = self::$app["malla"]->load("coredb")->getType($type) ) ) {

				foreach ($stors as $app ) {
					if($app->activated == 1) {
						/*
						* LOAD APP RESOURCES */
						if( !empty( ($configs = self::$app["malla"]->load("coredb")->getConfig($type, $app)) ) ) {
							foreach ( $configs as $config ) {
								config()->set($config->key, $config->value);
							}
						}

						/*
						* LOAD APP KERNEL */
						$this->run($app->kernel);
					}
				}
			}
		}
	}
}
