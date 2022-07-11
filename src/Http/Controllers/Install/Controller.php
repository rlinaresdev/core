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

          ## ENV CONTENT LAYOUT
          if( __segment(1, "install") && __segment(2, "env") ) {
             $this->skin->setLayout("container", "col-4 offset-4");
          }

          ## DATABASE CONTENT LAYOUT
          if( __segment(1, "install") && __segment(2, "database") ) {
             $this->skin->setLayout("container", "col-4 offset-4");
          }
       }

}
