<?php
namespace Core\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Core\Http\Controllers\Support\Home;

class HomeController extends Controller {

   public function __construct( Home $app ) {
      $this->boot($app);
   }

   public function index() {
      return $this->render( "home", $this->app->home() );
   }

   public function requeriment() {
      return $this->render( "requeriment", $this->app->requeriment() );
   }
}
