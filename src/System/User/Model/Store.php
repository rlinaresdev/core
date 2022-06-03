<?php
namespace Core\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class Store extends Model {

   protected $table = "users";

   protected $fillable = [
      "fullname",
      "user",
      "email",
      "password",
      "email_verified_at"
      
   ];

   //public $timestamps = false;

   //protected $dateFormat = 'U';
}
