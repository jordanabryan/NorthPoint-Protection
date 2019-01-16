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

Route::group(['middleware' => ['web']], function(){


	/* FRONT END RUOTES */

	Route::get('/', [
		'uses' => 'LayoutController@getHomePage',
		'as' => 'index'
	]);

	Route::get('/about/', function () {
	    return view('about');
	})->name('about');

	Route::get('/services/', [
		'uses' => 'ServiceController@getServicesPage',
		'as' => 'services'
	]);

	Route::get('/services/{slug}', [
		'uses' => 'ServiceController@getServicePage',
		'as' => 'service'
	]);

	Route::post('/services/submit', [
		'uses' => 'ServiceController@servicePageSubmit',
		'as' => 'serviceSubmit'
	]);

	Route::get('/services/{service}', function () {
	    return view('service');
	})->name('service');

	Route::get('/contact/', function () {
	    return view('contact');
	})->name('contact');

	Route::post('/contact/submit', [
		'uses' => 'ServiceController@contactPageSubmit',
		'as' => 'contactSubmit'
	]);

	Route::post('/quickcontact', [
		'uses' => 'ServiceController@quickContactSubmit',
		'as' => 'quickContactSubmit'
	]);

	Route::get('/privacy/', function () {
	    return view('privacy');
	})->name('privacy');

	Route::get('/terms/', function () {
	    return view('terms');
	})->name('terms');

	
	Route::get('404', [
		'uses' => 'ErrorController@notfound',
		'as' => '404'
	]);
	
	Route::get('500', [
		'uses' => 'ErrorController@fatal',
		'as' => '500'
	]);


	/* ADMIN RUOTES */

	//login form post to signin
	Route::get('/admin/login', [
		'uses' => 'AdminController@getLogin',
		'as' => 'login'
	]);

	Route::post('/admin/logincheck', [
		'uses' => 'AdminController@postLogin',
		'as' => 'logincheck'
	]);

	//get the logout page
	Route::get('/admin/logout', [
		'uses' => 'AdminController@getLogout',
		'as' => 'logout'
	]);

	Route::get('/admin/', [
		'uses' => 'AdminController@getAdminIndexPage',
		'as' => 'admin.index',
		'middleware' => 'auth'
	]);

	Route::post('/admin/settings_update', [
		'uses' => 'AdminController@postSettingsUpdate',
		'as' => 'admin.settings_update',
		'middleware' => 'auth'
	]);

	Route::get('/admin/messages', [
		'uses' => 'AdminController@getAdminMessagePage',
		'as' => 'admin.messages',
		'middleware' => 'auth'
	]);

	Route::post('/admin/messages/message_send', [
		'uses' => 'AdminController@postMessageSend',
		'as' => 'admin.messages_send',
		'middleware' => 'auth'
	]);

	Route::get('/admin/messages/{id}', [
		'uses' => 'AdminController@getAdminSingleMessagePage',
		'as' => 'admin.message',
		'middleware' => 'auth'
	]);

	Route::get('/admin/services/', [
		'uses' => 'AdminController@getAdminServicesPage',
		'as' => 'admin.services',
		'middleware' => 'auth'
	]);

	Route::get('/admin/services/{id}', [
		'uses' => 'AdminController@getAdminServicePage',
		'as' => 'admin.service',
		'middleware' => 'auth'
	]);

	Route::post('/admin/services/service_update', [
		'uses' => 'AdminController@postServiceUpdate',
		'as' => 'admin.service_update',
		'middleware' => 'auth'
	]);

	Route::post('/admin/services/service_add', [
		'uses' => 'AdminController@postServiceAdd',
		'as' => 'admin.service_add',
		'middleware' => 'auth'
	]);

});