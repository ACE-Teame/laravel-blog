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


// Route::get('id', function() {
// 	return view('welcome');
// });
Route::get('get',function() {
	return 'I’m get';
});

Route::get('student/info', 'StudentController@info');
Route::get('student/query', 'StudentController@query');
Route::get('student/queryins', 'StudentController@queryins');
Route::get('student/querydel', 'StudentController@querydel');
Route::get('student/querysel', 'StudentController@querysel');
Route::get('student/queryjuhe', 'StudentController@queryjuhe');

Route::get('student/orm', 'StudentController@orm');
Route::get('student/ormins', 'StudentController@ormins');
Route::get('student/ormupt', 'StudentController@ormupt');
Route::get('student/ormdel', 'StudentController@ormdel');
// Route::get('test/index', 'TestController@index');
// Route::get('test/index', ['uses' => 'TestController@index']);



// Route::get('test/{id}', [
// 	'uses' => 'TestController@index',
// 	'as'   => 'testin'
// ])->where(['id' => '[0-9]+']);

// Route::get('test/{id}', [
// 	'uses' => 'TestController@info',
// 	'as'   => 'testfo'
// ]);



// Route::post('post',function() {
// 	return 'I’m post';
// });
// Route::match(['get', 'post'],'match', function() {
// 	return 'I’m match';
// });

// Route::any('any', function() {
// 	return 'I’m any';
// });
// Route::get('user/{id}', function($id) {
// 	return 'user-id-' . $id;
// });

// Route::get('user/{name?}', function($name = 'cuihua') {
// 	return 'user-name-' . $name;
// })->where('name', '[A-Za-z]+');
// Route::get('user/{id}/{name?}', function($id, $name = 'cuihua') {
// 	return 'user-id='.$id.'-name=' . $name;
// })->where(['id' => '[0-9]+', 'name' => '[A-Za-z]+']);

// 理由别名
// Route::get('user/as', ['as' => 'ias', function() {
// 	// return 'user - as';
// 	return route('ias');
// }]);

// 路由群组
Route::group(['prefix' => 'user'], function () {
	// 在路由群组中的url访问需增加群组前缀
	// 如：http://localhost/laravel/public/user/user/as
	Route::get('user/as', ['as' => 'ias', function() {
		return route('ias');
	}]);
	// http://localhost/laravel/public/user/get
	Route::get('get',function() {
		return 'member I’m get';
	});
});

// 路由中输出视图
Route::get('view', function() {
	return view('welcome');
});


Route::any('foo', function() {
    return 'foo';
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
    //
});
