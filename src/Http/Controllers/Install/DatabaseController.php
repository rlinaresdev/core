<?php
namespace Core\Http\Controllers\Install;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Core\Http\Controllers\Install\Request\User;
use Core\Http\Controllers\Install\Support\Database;

class DatabaseController extends Controller {

   public function __construct( Database $app ) {
      $this->boot($app);
   }

   public function index() {
      return $this->render( "database", $this->app->data() );
   }

   public function forge( User $request ) {
      return $this->app->forge($request);
   }
}
