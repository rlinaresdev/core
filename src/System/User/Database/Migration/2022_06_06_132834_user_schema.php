<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

      if( !Schema::hasTable("users") ) {
         Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('fullname')->nullable();
            $table->string("rnc", 30)->nullable();
            $table->string('user')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 80);
            $table->string("avatar", 200)->default("__avapath/avatar.png");

            $table->char("activated", 1)->default(0);
            $table->rememberToken();
            $table->timestamps();
         });
      }

      if( Schema::hasTable("users") && !Schema::hasTable("usersdata") ) {
         Schema::create('usersdata', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("firstname", 30);
            $table->string("lastname", 30);
            $table->string("email", 100)->nullable();
            $table->date("birthday")->nullable();
            $table->string("gender", 40)->nullable();
         });
       }

      if(Schema::hasTable("users") && !Schema::hasTable("usersmeta") ) {
         Schema::create('usersmeta', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("type", 30)->default("info");

            $table->string('key', 255);
            $table->text('value')->nullable();

            $table->boolean('activated')->default(1);
         });
      }

      if(Schema::hasTable("users") && !Schema::hasTable("usersgroups") ) {
         Schema::create('usersgroups', function (Blueprint $table) {
            $table->increments('id');

            $table->integer("parent")->default(0);

            $table->string("slug");
            $table->string('name');

            $table->boolean('activated')->default(1);

            $table->timestamps();
         });
      }

      if(Schema::hasTable("usersgroups") && !Schema::hasTable("usersgroups_pivots") ) {
         Schema::create('usersgroups_pivots', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('usersgroups')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->boolean("view")->default(1);
            $table->boolean("insert")->default(0);
            $table->boolean("update")->default(0);
            $table->boolean("delete")->default(0);
         });
      }
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::dropIfExists('usersgroups_pivots');
      Schema::dropIfExists('usersgroups');
      Schema::dropIfExists('usersmeta');
      Schema::dropIfExists('usersdata');
      Schema::dropIfExists('users');
    }
};
