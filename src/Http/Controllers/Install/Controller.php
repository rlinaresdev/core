<?php
namespace Core\Http\Controllers\Install;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Core\Http\Controllers\Controller as BaseController;

class Controller extends BaseController {

       protected $path = "core::install.";

       public function parseData() {

          ## TEMPLATE
          $this->skin->setOrCreateVar("template", "core::install.layout");

          $this->skin->setLayout("container", "col-4 offset-4");
       }

}
