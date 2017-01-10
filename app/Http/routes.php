<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    // auth system routes
    Route::auth();

    // front part routes
    Route::get('/home', 'HomeController@index');// constotur 使用了auth中间件
    Route::any('/upload', 'KpTelloController@upload');
    Route::get('/queue', 'KpTelloController@queue');


    Route::get('/animate/{id}', 'HomeController@specials')->where('id', '[0-9]+'); // 合集专辑
    Route::get('/videos/{avid}', 'HomeController@videos')->where('avid', 'av[0-9]+');  // 分集视频
    Route::get('/search', 'HomeController@search');  // 搜索

    Route::post('/like/a/', 'HomeController@alike');  // 点赞
    Route::post('/like/v/', 'HomeController@vlike');  // 点赞


});


/*
|--------------------------------------------------------------------------
| Test Routes
|--------------------------------------------------------------------------
|
| This route group is for testing
*/
Route::controller('cate', 'CategoryController');
Route::controller('special', 'SpecialController');
Route::controller('snatch', 'SnatchController');