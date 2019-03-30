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

use Illuminate\Support\Facades\Route;

Route::get('/login', ['as' => 'login' , 'uses' => 'Users\AuthController@index']);

Route::get('/login-admin', ['as' => 'login-admin' , 'uses' => 'Users\AuthController@indexAdmin']);

Route::post('/do-login', ['as' => 'do-login' , 'uses' => 'Users\AuthController@login']);

Route::post('/do-login-admin', ['as' => 'do-login-admin' , 'uses' => 'Users\AuthController@loginAdmin']);

Route::get('/register' , 'Users\AuthController@register');

Route::get('/do-register' , ['as' => 'register' , 'uses' =>  'Users\AuthController@store']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        $data['selection'] = 0;

        return view('content.dashboard' , compact('data'));
    });

    Route::get('/logout', [ 'as' => 'logout' , 'uses' => 'Users\AuthController@logout']);

    Route::group(['middleware' => 'role.admin'] , function (){

        //Users and Admin
        Route::resource('users' , 'Users\UsersController');
        Route::resource('admin' , 'Users\AdminController');

        //tarif
        Route::resource('tarif' , 'Tarif\TarifController');

        //roles management
        Route::resource('roles' , 'Roles\RolesController');

        //Penggunaan controller
        Route::resource('penggunaan' , 'Penggunaan\PenggunaanController');

    }) ;

});