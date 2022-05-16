<?php

/*
 *---------------------------------------------------------
 * ©IIPEC
 * Santo Domingo República Dominicana.
 *---------------------------------------------------------
*/

Route::get("/", "HomeController@index");
Route::get("/requeriments", "HomeController@requeriment");

Route::get("/env", "EnvController@index");
Route::post("/env", "EnvController@update");

Route::get("/env/published", "EnvController@published");
Route::get("/database", "DatabaseController@index");
