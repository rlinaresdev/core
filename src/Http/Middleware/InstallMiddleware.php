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

class InstallMiddleware {

   protected $exerts = [];

   public function handle($request, Closure $next, $guard = "web") {

      
      return $next($request);
   }
}
