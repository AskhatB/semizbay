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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/','IndexController@message')->name('report');
Route::get('events','IndexController@show')->name('events');
Route::get('events/{id}' ,'IndexController@adminEvents');
Route::post('/fixSituation/{id}','IndexController@fixSituation')->name('fixSituation');
Route::get('/fix_event/{id}','IndexController@fixShow')->name('fixShow');
Route::get('/info/{id}','IndexController@info')->name('infoShow');
Route::post('/','IndexController@imgUpload')->name('imgUpload');
Route::get('/fixed_events','IndexController@listFixSit');
Route::get('/fixed_events/{id}','IndexController@fixed_sit')->name('fixed_sit');
Route::get('auth/login', 'IndexController@getLogin');
Route::post('auth/login', 'IndexController@postLogin');
Route::get('mobile/events','IndexController@mobileEvents');
Route::get('mobile/info{id}','IndexController@mobileInfo')->name('mobileInfo');
Route::get('success','IndexController@success');
Route::get('delete', 'IndexController@deleteSuccess')->name('delete');

Route::get('message', 'IndexController@message');
Route::get('profile', 'IndexController@profile');
Route::get('logout','IndexController@logout')->name('logout');

