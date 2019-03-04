<?php

use App\Zipcodes;
use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('zipcodes/{search?}', 'ZipcodeController@index')->name('zipcodes');
Route::get('zipcodes/id/{id}', 'ZipcodeController@show');
//Route::get('zipcodes/{zip}', 'ZipcodeController@zip');
Route::get('zipcodes/edit/{id}', 'ZipcodeController@show');