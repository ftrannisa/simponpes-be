<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('login', 'LoginController@_login');
Route::post('login', 'LoginController@_login');
Route::middleware('token')->group(function(){
	Route::prefix('auth')->group(function () {
		Route::get('token', 'LoginController@_cekToken');
		Route::post('register', function(){
			return Response('OK', 200);
		});
		Route::post('user/update', function(){
			return Response('OK', 200);
		});

	});
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('santris', 'API\SantriAPIController');

Route::resource('pegawais', 'API\PegawaiAPIController');

Route::resource('unit_usahas', 'API\UnitUsahaAPIController');

Route::resource('ekstrakulikulers', 'API\EkstrakulikulerAPIController');

Route::resource('users', 'API\UserAPIController');

Route::resource('orang_tuas', 'API\OrangTuaAPIController');

Route::get('getRefJenisToko', 'API\UnitUsahaAPIController@getRefJenisToko');

Route::get('getRefBidang', 'API\PegawaiAPIController@getRefBidang');

Route::get('getRefPeran', 'API\PegawaiAPIController@getRefPeran');