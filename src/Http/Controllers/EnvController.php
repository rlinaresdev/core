<?php
namespace Core\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Illuminate\Http\Request;
use Core\Http\Controllers\Support\Env;

class EnvController extends Controller {

   public function __construct( Env $app ) {
      $this->boot($app);

      $this->skin->setLayout("container", "col-6 offset-3");
   }

   public function index() {
      return $this->render( "env", $this->app->data() );
   }

   public function update( Request $request ) {
      return $this->app->update($request);
   }

   public function published() {
      return $this->app->published();
   }
}
