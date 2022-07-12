<?php
namespace Core\Http\Controllers\Install\Support;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class End {

   protected $app;

   public function __construct(  ) {
   }

   public function data() {
      $data["title"] = 'End Core Install';

      return $data;
   }
}
