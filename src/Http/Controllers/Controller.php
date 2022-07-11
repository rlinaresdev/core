<?php
namespace Core\Http\Controllers;

/*
  *---------------------------------------------------------
  * ©IIPEC
  * Santo Domingo República Dominicana.
  *---------------------------------------------------------
*/

use Core\Http\Skin;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

   use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   protected $app;

   protected $path = "core::";

   protected $skin;

   public function boot( $app=null, $data=[] ) {

      $theme = "bluelight";

      $this->skin = new Skin($theme);

      $this->app        = $app;
      $data["path"]     = $this->path;
      $data["skin"]     = $this->skin;
      $data["title"]    = "Empty";
      $data["charset"]  = "utf-8";
      $data["language"] = "es";

      if( $theme == "bluelight" ) {
         app("core")->addUrl([
            "__bluelight" => __url("__cdn/"),
         ]);
      }

      $this->share($data);

      if( method_exists($app, "share") ) {
         $this->share($app->share());
      }

      if( method_exists($this, "parseData") ) {
         $this->parseData();
      }
   }

   public function share($data) {
      if(!empty($data) && is_array($data) ) {
         view()->share($data);
      }
   }

   public function render($view=NULL, $data=[], $mergeData=[]) {

      if(view()->exists(($path = $this->path.$view))) {
         return view($path, $data, $mergeData);
      }

      abort(500, "La vista {$path} no existe");
   }

}
