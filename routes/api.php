<?php

use App\Http\Controllers\DummyApi;
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


// Route::get('get-users-api/{id?}',[DummyApi::class,'users_data']);
// Route::get('get-usersbyname-api/{name?}',[DummyApi::class,'byname_users_data']);
// Route::post('user-inquiry-api',[DummyApi::class,'users_inquiry']);
// Route::put('user-update-inquiry-api',[DummyApi::class,'users_inquiry_update']);
// Route::delete('user-delete-inquiry-api/{id}',[DummyApi::class,'users_inquiry_detele']);
// Route::get('seacrh-users-api/{searchkey?}',[DummyApi::class,'seacrh_data']);

