<?php
namespace Core\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Translation\Translator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {

   protected $HTTP;

   protected $LANG;

   public function boot( Kernel $HTTP, Translator $LANG ) {
      $this->HTTP = $HTTP;
      $this->LANG = $LANG;
      require_once(__path("__core/Http/App.php"));
   }

   public function register() {
   }

   public function bootMiddleware($handler) {
      if(!is_object($handler)) {
         $handler = new $handler;
      }

      ## INIT
      if( !empty( ( $initialzer = $handler->init()) ) ) {
         foreach ($initialzer as $middleware ) {
            $this->HTTP->pushMiddleware($middleware);
         }
      }

      ## GROUPS
      if( !empty( ( $groups = $handler->groups()) ) ) {
         foreach ( $groups as $group => $middlewares ) {
            $this->app["router"]->middlewareGroup($group, $middlewares);
         }
      }


   }

   public function loadGrammary($locale) {

      $this->app->setLocale( ($locale = "es_DO") );

      if( !empty( ($grammaries = $this->getGrammars(__path("__locale/$locale.php"))) ) ) {
         $this->LANG->addLines($grammaries, $locale);
      }
   }

   public function getGrammars( $locale ) {
      if( $this->app["files"]->exists($locale) ) {
         return $this->app["files"]->getRequire($locale);
      }
      return NULL;
   }
}
