<?php
namespace Core\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class UserData extends Model {

   protected $table = "usersdata";

   protected $fillable = [
      'user_id',
      "firstname",
      "lastname",
      "email",
      "birthday",
      "gender"
   ];

   //public $timestamps = false;

   //protected $dateFormat = 'U';
}
