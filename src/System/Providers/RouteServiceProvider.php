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

   protected $namespace = "Core\Http\Controllers";

   public function boot() {
      parent::boot();
   }

   public function map() {
      Route::middleware("web")->namespace($this->namespace)->group(__path('__core/Http/Routes.php'));
   }
}
