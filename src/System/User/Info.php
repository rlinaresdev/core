<?php
namespace Core\User;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Info {
  	public function app() {
  		return [
  			"type"			=> "library",
  			"slug"			=> "users",
  			"kernel"		   => \Vendor\Kernel::class,
  			"info"			=> \Vendor\Info::class,
  			"token"			=> NULL,
  			"activated" 	=> 1,
  		];
  	}

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

   public function migrate($opt="up") {
      $path = str_replace(base_path().'/', null, __DIR__."/UserSchema.php");
   
      if( $opt == "up" ) {
         \Artisan::call("migrate", ["--path" => $path]);
      }
   }

  	public function meta() {
  		return [
  		];
  	}

  	public function handler($core) {
  		$core->create($this->app())->addInfo($this->info())->addMeta("type", $this->meta());
  	}
}
