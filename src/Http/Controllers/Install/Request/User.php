<?php
namespace Core\Http\Controllers\Install\Request;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Foundation\Http\FormRequest;

class User extends FormRequest {

   public function authorize() {
      return true;
   }

   public function rules() {
      return [
         "email"     => "required",
         "pwd"       => "required",
         "rpwd"      => "same:pwd"
      ];
   }

}
