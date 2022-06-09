<?php
namespace Malla\Model;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Illuminate\Database\Eloquent\Model;

class UserMeta extends Model {

   protected $table = "usersmeta";

   protected $fillable = [
      "user_id",
      "type",
      "key",
      "value",
      "activated",
   ];

   public $timestamps = false;

   //protected $dateFormat = 'U';
}
