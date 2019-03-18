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



Route::group(['namespace'  => "Api"], function () {
	Route::resource('search', 'RentShopController');//这里相当于有7个路由 涵盖增删改查 直接再改控制器书写逻辑即可
	Route::get('find', 'RentShopController@findArea');//获取区域
    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });

});


//Route::resource('users', 'UsersController');
//上面代码将等同于：
//Route::get('/users', 'UsersController@index')->name('users.index');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
//Route::get('/users/create', 'UsersController@create')->name('users.create');
//Route::post('/users', 'UsersController@store')->name('users.store');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');

