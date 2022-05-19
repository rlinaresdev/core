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
      $data["title"]          = __("words.database");
      $data["engine"]   = $this->widgetDB();

      return $data;
   }

   public function widgetDB() {
      return [
         __("words.engine")   => env("DB_CONNECTION"),
         __("words.host")     => env("DB_HOST"),
         __("words.port")     => env("DB_PORT"),
         __("words.database") => env("DB_DATABASE"),
         __("words.user")     => env("DB_USERNAME")
      ];
   }

   public function forge( $request ) {
      return [];
   }
}
