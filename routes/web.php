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


//登陆模块
Route::group(['namespace'  => "Auth"], function () {
    Route::get('/login',                'LoginController@showLoginForm')->name('login');
    Route::post('/login',               'LoginController@login');
    Route::get('/logout',               'LoginController@logout')->name('logout');
});


Route::group(['namespace'  => "Web"], function () {
    //验证码
    Route::get('/verify',                   'HomeController@verify');
    //后台主要模块
    Route::group(['middleware' => ['auth', 'permission']], function () {
        Route::get('/',                     'HomeController@index');
        Route::get('/gewt',                 'HomeController@configr');
        Route::get('/index',                'HomeController@welcome');
        Route::post('/sort',                'HomeController@changeSort');
        Route::resource('/menus',           'MenuController');
        Route::resource('/logs',            'LogController');
        Route::resource('/users',           'UserController');
        Route::get('/userinfo',             'UserController@userInfo');
        Route::post('/saveinfo/{type}',     'UserController@saveInfo');
        Route::resource('/roles',           'RoleController');
        Route::resource('/permissions',     'PermissionController');
        Route::resource('/list',            'RentShopController');
    });

});

//Route::resource('users', 'UsersController');
//上面Route::resource()代码将等同于：
//Route::get('/users', 'UsersController@index')->name('users.index');
//Route::get('/users/{user}', 'UsersController@show')->name('users.show');
//Route::get('/users/create', 'UsersController@create')->name('users.create');
//Route::post('/users', 'UsersController@store')->name('users.store');
//Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
//Route::patch('/users/{user}', 'UsersController@update')->name('users.update');
//Route::delete('/users/{user}', 'UsersController@destroy')->name('users.destroy');










