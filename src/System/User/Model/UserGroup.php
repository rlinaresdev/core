<?php
namespace Core\User\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model {

   protected $table = "usersgroups";

   protected $fillable = [
      "user_id",
      "parent",
      "slug",
      "name",
      "view",
      "insert",
      "update",
      "delete",
      "activated",
      "created_at",
      'updated_at'
   ];

   //public $timestamps = false;

   //protected $dateFormat = 'U';
}
