<?php
namespace Core\User;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Driver {

   public function info() {
  		return [
  			"name"			=> "Name",
  			"author"		   => "Ing. Ramón A Linares Febles",
  			"email"			=> "rlinares4381@gmail.com",
  			"license"		=> "MIT",
  			"support"		=> "http://www.iipec.net",
  			"version"		=> "V-1.0",
  			"description" 	=> "Name V-1.0",
  		];
  	}

  	public function app() {
  		return [
  			"type"			=> "library",
  			"slug"			=> "users",
  			"driver"			=> \Core\User\Driver::class,
  			"token"			=> NULL,
  			"activated" 	=> 1,
  		];
  	}

   public function kernel() {
      return \Core\User\Kernel::class;
   }

   public function migrate($opt="up") {

      $path = __DIR__."/Database/Migration";
      $path = str_replace(base_path().'/', null, $path);

      if( $opt == "up" ) {
         \Artisan::call("migrate", ["--path" => $path]);
      }

      if( $opt == "reset" ) {
         \Artisan::call("migrate:reset", ["--path" => $path]);
      }
   }

   public function seeder() {
      \Artisan::call("db:seed", [
         "--class" => \Core\User\Database\Seeder\Account::class
      ]);
   }

   public function install( $core ) {
      $app  = $this->app();
      $info = $this->info();

      if( !$core->has($app["type"], $app["slug"]) ) {
         $core->create( $app )->addInfo( $info );
         $this->migrate("up");
         $this->seeder();
      }
   }

   public function uninstall() {
      $this->migrate("reset");
   }

  	public function meta() {
  		return [
  		];
  	}

  	public function handler($core) {
  		//$core->create($this->app())->addInfo($this->info())->addMeta("type", $this->meta());
  	}
}
