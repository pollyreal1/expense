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


Route::post('login', 'AuthController@login');
Route::resource('users', 'UserController');
Route::resource('roles', 'RoleController');
Route::resource('categories', 'CategoryController');
Route::resource('expenses', 'ExpenseController');
Route::post('dashboard', 'ExpenseController@dashboard');
Route::post('changepass', 'UserController@ChangePassword');
