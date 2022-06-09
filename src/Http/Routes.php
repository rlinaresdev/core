<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::prefix("install")->middleware("install")->group(function($route){
   Route::get("/", "HomeController@index");
   Route::get("/requeriments", "HomeController@requeriment");

   Route::get("/env", "EnvController@index");
   Route::post("/env", "EnvController@update");

   Route::get("/env/published", "EnvController@published");

   Route::prefix("database")->group(function($route){
      Route::get("/", "DatabaseController@index");
      Route::post("/", "DatabaseController@forge");

      Route::get("/forge", function() {
         return "trabajando";
      });
   });
});
