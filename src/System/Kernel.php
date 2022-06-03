<?php
namespace Core;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/
use \ZipArchive;

class Kernel {

   protected $services = [
      
   ];

   protected $aliases = [];

	public function providers() {
		return $this->services;
	}

	public function alias() {
		return $this->aliases;
	}

	public function handler($app) {
      if( $app["core"]->stable() == false ) {
         $this->services = [
            \Core\Providers\AppServiceProvider::class,
            \Core\Providers\RouteServiceProvider::class
         ];
      }

	}
}
