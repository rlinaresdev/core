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
Route::get("/database", "DatabaseController@index");
