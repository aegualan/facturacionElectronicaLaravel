<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
     return view('welcome');
    // return bcrypt("123");
//    $cadena = " GU A LAN LOZANO ANGEL EDUARDO";
//  $cadena =  str_replace(' ', '', $cadena);
//    return substr($cadena, 0,3);
    
    
//     $result = array();
//   for ($n = 1; $n < 1 + 10; $n++) {
//      $result[] = str_pad($n, 9, "0", STR_PAD_LEFT);
//   }
    
   // $result = str_pad(100078, 9, "0", STR_PAD_LEFT);
   //return $result;
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('emisor','EmisorController@index')->name('emisor');
Route::post('emisor','EmisorController@store')->name('emisor.store');
//Route::resource('emisor','EmisorController');

//Route::post('imagen','ImagenController@store')->name('imagen.store');

