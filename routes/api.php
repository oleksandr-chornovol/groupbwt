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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/countries/getUsers', 'App\Http\Controllers\CountryController@getUsers');

Route::post('/companies/addUser', 'App\Http\Controllers\CompanyController@addUser');

Route::apiResource('countries', 'App\Http\Controllers\CountryController');
Route::apiResource('companies', 'App\Http\Controllers\CompanyController');

