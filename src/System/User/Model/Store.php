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
      "rnc",
      "user",
      "cellphone",
      "email",
      "email_verified_at",
      "password",
      "avatar",
		"activated",
		"created_at",
		"updated_at"
   ];

   protected $hidden = [
      'password', 'remember_token',
   ];

   /*
  * SETTINGS */
   public function setPasswordAttribute($value) {
      $value = trim($value);
      $value = bcrypt($value);
      $this->attributes['password'] = $value;
   }

   /*
  * RELATIONS */
   public function info() {
      return $this->hasOne(UserData::class, "user_id");
   }
   public function meta() {
      return $this->hasMany(UserMeta::class, "user_id");
   }

   public function groups() {
      return $this->belongsToMany(UseGroup::class, "usersgroups_pivots", "user_id", "group_id")->withPivot(
          "view", "insert", "update", "delete"
      );
   }

   //public $timestamps = false;

   //protected $dateFormat = 'U';
}
