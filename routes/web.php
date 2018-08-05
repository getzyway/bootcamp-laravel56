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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/demotwo', 'DemoController@demotwo');

Route::match(['get', 'post', 'delete'], '/demothree', 'DemoController@demothree');

Route::any('/demofour', 'DemoController@demofour');

Route::get('demosix/{id}/{name}', function ($id, $name) {
    return 'ID: '.$id.' || NAME: '.$name;
});


Route::group(['middleware' => ['XSS']], function () {
    Route::get('demoone', 'DemoController@index');
});

Route::prefix('demo')->group(function () {
    Route::any('demofour', 'DemoController@demofour');
    Route::get('demoone', 'DemoController@index');
    //Route::get('one', 'DemoController@index');
});

Route::prefix('{lang}')->middleware('lang')->group(function ($local) {
    App::setlocale('en');
    Route::get('demox', 'DemoController@index');
});

Route::get('demoten/age/{age}/school/{school}', function ($age, $school) {
    return 'demoten age: '.$age.' || SCHOOL: '.$school;
});

Route::resource('photos', 'PhotoController');

Route::get('login', 'LoginController@index')->name('login');
Route::get('logout', 'LoginController@logout');
Route::post('login', 'LoginController@authenticate');

//Route::resource('admin/user', 'Admin\UsersController');
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('user', 'Admin\UsersController');
    Route::get('demoone', 'DemoController@index');
});

Route::get('testexcel','DemoController@testexcel');
