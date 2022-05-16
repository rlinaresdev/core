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

      if( !app("files")->exists(__path("__cdn")) ) {
         \Artisan::call("vendor:publish", ["--tag" => "core", "--force" => true]);
      }
   }

   public function data() {
      $data["title"] = "Anviente Servidor";
      $data["env"]   = app("files")->get(base_path('.env'));

      return $data;
   }

   public function published(){
      \Artisan::call("vendor:publish", ["--tag" => "core", "--force" => true]);
      return back();
   }
}
