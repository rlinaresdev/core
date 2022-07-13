<?php
namespace Core\Providers;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider {

   protected $namespace    = "Core\Http\Controllers";

   protected $domain       = "__core/Http/Route/Install.php";

   public function boot() {
      parent::boot();

      if( core()->start() ) {
         $this->domain = "__core/Http/Route/App.php";
      }
   }

   public function map() {

      Route::middleware("web")
         ->namespace("Core\Http\Controllers")->group(__path($this->domain));
   }
}
