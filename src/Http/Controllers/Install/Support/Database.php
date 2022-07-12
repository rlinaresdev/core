<?php
namespace Core\Http\Controllers\Install\Support;

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

   public function __construct( Core $app ) {
      $this->app = $app;
   }

   public function data() {

      $data["title"]       = __("words.database");
      $data["engine"]      = $this->widgetDB();
      $data["isdb"]        = \Schema::hasTable("apps");

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

   public function  updateOrCreate( $email, $password ) {

      if( ($user = (new \Core\User\Model\Store)->where("email", $email))->count() > 0 ) {
         $user             = $user->first();

         $user->email      = $email;
         $user->password   = $password;

         $user->save();
      }
      else {
         (new \Core\User\Model\Store)->create([
            "email"     => $email,
            "password"  => $password
         ]);
      }
   }

   public function forge( $request ) {

      ## SCHEMA
      foreach ( $this->components as $slug => $component ) {
         if( method_exists( ($module = new $component), "install" ) ) {
            $module->install( new Core );
         }
      }

      ## ACCOUNT
      $this->updateOrCreate(
         $request->input("email"), $request->input("pwd")
      );

      return redirect()->to("install/end");
   }

   public function destroyDB() {

      $orders = [
         "widget","theme","package","plugin","library","core"
      ];

      ## DESTROY
      foreach( $orders as $type ) {
         $this->destroyType($type);
      }

      return back();
   }

   public function destroyType( $type ) {

      if( ($app = $this->app->type($type))->count() > 0 ) {
         foreach ( $app->orderBy("id", "DESC")->get() as $row ) {
            $info = $row->info;
            $info = new $info;

            if( method_exists($info, "uninstall") ) {
               $info->uninstall();
            }
         }
      }
   }

}
