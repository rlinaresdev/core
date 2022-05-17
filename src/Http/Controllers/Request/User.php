<?php
namespace Core\Http\Controllers\Request;

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
         "user"   => "required",
         "pwd"    => "required|same:rpwd"
      ];
   }
}
