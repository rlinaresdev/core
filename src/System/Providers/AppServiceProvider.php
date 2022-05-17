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

   public function boot( Kernel $HTTP, Translator $LANG ) {
      require_once(__path("__core/Http/App.php"));
   }

   public function register() {
   }

   public function getGrammars( $locale ) {
      if( $this->app["files"]->exists($locale) ) {
         return $this->app["files"]->getRequire($locale);
      }
      return NULL;
   }
}
