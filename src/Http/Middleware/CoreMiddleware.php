<?php
namespace Core\Http\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Closure;
use IlluminateSupportFacadesAuth;

class CoreMiddleware {

   protected $exerts = [];

   public function handle($request, Closure $next, $guard = "web") {
      
      if( core()->isAppStart("core", "core") == false && __segment(1) != "install" ) {
         return redirect("install");
      }

      return $next($request);
   }

}
