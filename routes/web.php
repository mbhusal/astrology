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


Auth::routes();

Route::get('/', 'UserController@index')->name('root');

Route::get('/details/{slug}', 'UserController@details')->name('details');

Route::get('/horoscope', ['as' => 'horoscope', 'uses' => 'HoroscopeController@index']);

Route::get('/myrasi/{slug}', 'HoroscopeController@now')->name('myrasi');

Route::get('/lang/{slug}', 'UserController@lang')->name('lang');




/*
|--------------------------------------------------------------------------
| Blogs Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/postitems', 'HomeController@postitems')->name('postItems');

Route::post('/ideaposted', 'HomeController@ideaposted')->name('ideaposted');

Route::get('/myprofile', 'HomeController@myprofile')->name('myprofile');

Route::get('/publishme/{id}', 'HomeController@publishme')->name('publishme');

Route::get('/unpublishme/{id}', 'HomeController@unpublishme')->name('unpublishme');

Route::get('/archives', ['as' => 'archives', 'uses' => 'UserController@archives']);


/*
|--------------------------------------------------------------------------
| Horoscope Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/managerasi', 'HomeController@managerasi')->name('managerasi');

Route::get('/post_horoscope', 'HomeController@post_horoscope')->name('post_horoscope');

Route::post('/rasiposted', 'HomeController@rasiposted')->name('rasiposted');

Route::post('/updaterasiposted', 'HomeController@updaterasiposted')->name('updaterasiposted');

Route::get('/editrasi/{id}', 'HomeController@editrasi')->name('editrasi');

Route::get('/post_today_horoscope', 'HomeController@post_today_horoscope')->name('post_today_horoscope');

Route::get('/post_monthly_horoscope', 'HomeController@post_monthly_horoscope')->name('post_monthly_horoscope');

Route::get('/post_yearly_horoscope', 'HomeController@post_yearly_horoscope')->name('post_yearly_horoscope');

Route::get('/rasi/{slug}', 'HomeController@getrasi')->name('rasi');


Route::get('/deleterasi/{id}', 'HomeController@deleterasi')->name('deleterasi');

Route::get('/now/{slug}', 'HomeController@now')->name('now');

