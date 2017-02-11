<?php
$api = app('Dingo\Api\Routing\Router');

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
Route::group(['middleware'=> ['web', 'auth']], function (){
    // 后台
    Route::controller('cate', 'CategoryController');
    Route::controller('special', 'SpecialController');
    Route::controller('snatch', 'SnatchController');
    Route::controller('post', 'PostController');
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
    Route::get('/index', 'FrontController@index');
    Route::get('/animate/{id}', 'FrontController@specials')->where('id', '[0-9]+'); // 合集专辑
    Route::get('/videos/{avid}', 'FrontController@videos')->where('avid', 'av[0-9]+');  // 分集视频
    Route::get('/list/{cid}', 'FrontController@assortment')->where('cid', '[0-9]+'); // 分类页面

    Route::get('/search', 'FrontController@search');  // 搜索

    Route::any('/upload', 'KpTelloController@upload');
    Route::get('/queue', 'KpTelloController@queue');

});

/*
|--------------------------------------------------------------------------
| Api Routes
|--------------------------------------------------------------------------
|
| This route group applies the api for the project
|
 */
$api->version('v1', function ($api) {
    //test
    $api->get('/test','App\Http\Controllers\Api\V1\LikeController@test');

    // has not been done
    $api->post('/alike','App\Http\Controllers\Api\V1\LikeController@alike');
    $api->post('/vlike','App\Http\Controllers\Api\V1\LikeController@vlike');
});