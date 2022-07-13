<?php
namespace Core\Http\Controllers\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Core\Model\Core;

class End {

   protected $app;

   public function __construct( Core $app ) {
      $this->app = $app;
   }

   public function data() {
      $data["title"] = 'End Core Install';

      return $data;
   }

   public function close() {
      
      $app = $this->app->src("core", "core");
      $app->activated = 1;
      $app->save();

      return redirect()->to("/");
   }
}
