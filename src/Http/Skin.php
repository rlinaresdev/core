<?php
namespace Core\Http;

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

class Skin {

   protected $slug;

   public function __construct( $slug=null ) {
      $this->slug = $slug;
   }

   public function path($uri="master") {
      return "core::layout.$this->slug.$uri";
   }
   
   public function view($view=NULL, $data=[], $mergeData=[]) {
		if( view()->exists( ($path = $this->path($view)) ) ) {
			return view($path, $data, $mergeData);
		}

		return "ERROR 404 :: La vista {$path} no existe.";
	}
}
