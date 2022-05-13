<?php
namespace Core\Http\Controllers\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Env {

   protected $app;

   public function __construct( $app=null ) {
      $this->app = $app;
   }

   public function data() {
      $data["title"] = "Anviente Servidor";
      

      return $data;
   }
}
