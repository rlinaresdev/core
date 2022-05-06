<?php
namespace Core\Http\Controllers\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Home {

   protected $app;

   public function __construct( ) {
   }

   public function home() {
      $data["title"] = 'Core Install';

      return $data;
   }
}
