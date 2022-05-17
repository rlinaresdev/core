<?php
namespace Core\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Core\Http\Controllers\Request\User;
use Core\Http\Controllers\Support\Database;

class DatabaseController extends Controller {
   public function __construct( Database $app ) {
      $this->boot($app);
      $this->skin->setLayout("container", "col-6 offset-3");
   }

   public function index() {
      return $this->render( "database", $this->app->data() );
   }

   public function forge( User $request ) {
      return $this->app->forge($request);
   }
}
