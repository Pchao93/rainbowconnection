<?php

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware(['cors'])->group(function () {

    Route::get('/users/{user}', function (App\User $user) {
        return $user;
    });

    Route::get('/users', 'UsersController@index');

    Route::post('/users', 'UsersController@create');

    Route::put('/users/{id}', 'UsersController@update');

    Route::patch('/users/{id}', 'UsersController@update');

    Route::delete('/users/{id}', 'UsersController@destroy');

    Route::post('/connections', 'ConnectionsController@create');

    Route::delete('/connections', 'ConnectionsController@destroy');
});
