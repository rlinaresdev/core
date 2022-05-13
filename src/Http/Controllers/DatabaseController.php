<?php
namespace Core\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Core\Http\Controllers\Support\Database;

class DatabaseController extends Controller {
   public function __construct( Database $app ) {
      $this->boot($app);
   }

   public function index() {
      return $this->render( "database", $this->app->data() );
   }
}
