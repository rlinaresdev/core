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
      $this->skin->setLayout("container", "col-4 offset-4");
   }

   public function index() {
      return $this->render( "database", $this->app->data() );
   }

   public function forge( User $request ) {
      return $this->render("forge", $this->app->forge($request));
   }
}
