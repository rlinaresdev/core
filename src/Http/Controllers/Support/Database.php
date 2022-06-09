<?php
namespace Core\Http\Controllers\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/
use Core\User\Info;
use Core\Model\Core;

class Database {

   protected $app;

   protected $components = [
      "core"   => \Core\Info::class,
      "users"  => \Core\User\Info::class,
   ];

   public function __construct( ) {
   }

   public function data() {

      $data["title"]       = __("words.database");
      $data["engine"]      = $this->widgetDB();

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

      foreach ( $this->components as $slug => $component ) {
         if( method_exists( ($module = new $component), "install" ) ) {
            $module->install( new Core );
         }
      }

      (new \Core\User\Model\Store)->create([
         "email"     => $request->input("email"),
         "password"  => $request->input("pwd")
      ]);

      return redirect()->to("install/end");
   }

}
