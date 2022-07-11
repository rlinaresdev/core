<?php
namespace Core\Http\Controllers\Install\Support;

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

   public function requeriment() {
      $data["title"] = 'Core Install';

      return $data;
   }
}
