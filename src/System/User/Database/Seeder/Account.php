<?php
namespace Core\User\Database\Seeder;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

use Core\User\Model\UserGroup;
use Illuminate\Database\Seeder;

class Account extends Seeder {

   public function run() {
      $group = new UserGroup;
      $group->create(["slug"   => "owner","name"   => "group.owner"]);
      $group->create(["slug"   => "admin","name"   => "group.admin"]);
   }
}
