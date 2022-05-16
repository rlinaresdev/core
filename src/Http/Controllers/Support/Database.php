<?php
namespace Core\Http\Controllers\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Database {

   protected $app;

   public function __construct( ) {
   }

   public function data() {
      $data["title"] = __("words.database");

      return $data;
   }
}
