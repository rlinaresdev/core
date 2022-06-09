<?php
namespace Core\Http\Middleware;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Handler {

   public function init() {
      return [
         \Core\Http\Middleware\CoreMiddleware::class,
      ];
   }

   public function route() {
      return [];
   }
   public function groups() {
      return [
         "install" => [
            \Core\Http\Middleware\InstallMiddleware::class,
         ]
      ];
   }
}
