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

Route::get('/', function () {
    return view('welcome');
});
/** welcome */
Route::get('/welcome', function () {
    return view('welcome');
});
/**
 * web作为分组的前置url 后面加入中间件
 * namespace 作为控制器前置文件夹存在 123
 */
Route::group(["prefix" => "web", "namespace" => "Auth"], function() {
    /** login页面 */
    Route::get("/login", "LoginController@index");
    /** login提交 */
    Route::post("/login", "LoginController@login");
    /** login页面 */
    Route::get("/register", "RegisterController@index");
    /** login提交 */
    Route::post("/register", "RegisterController@createUser");
    /** logout */
    Route::get("/logout", "LoginController@logout");

});

Route::group(["prefix" => "welcome"], function (){
    /** doit扩展使用 */
    Route::get("/doit", "WelcomeController@showDo");
    Route::get("/echo", "WelcomeController@myEcho");
});

