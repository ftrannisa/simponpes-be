<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::middleware('web')->group(function(){
//     Route::get("/login","LoginController@login");
// });
Route::middleware('web')->group(function(){
    Route::get('login', 'LoginController@_login');
    Route::post('login', 'LoginController@_login');
    Route::get('ptk/getValidBkn', 'PtkController@getValidasiBkn');
   
   });