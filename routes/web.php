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

Route::group(['prefix' => '/'], function(){

	Route::get('', [
	 	'uses' => 'PagesController@home',
	 	'as' => 'page.home'
	]);

	Route::post('form-member', [
		'uses' => 'PagesController@members',
		'as' => 'page.membersform'
	]);

	Route::post('form-contact', [
		'uses' => 'PagesController@formContact',
		'as' => 'page.formcontact'
	]);

});


// Routes of the admin

Route::group(['prefix' => 'admin'], function (){

	Route::group(['middleware' => 'auth'], function(){

// routes of sections

		Route::get('sections', [
			'uses' => 'SectionsController@index',
			'as' => 'sections.index'
		]);

// routes of contents
		Route::get('contents/{id}', [
			'uses' => 'ContentsController@index',
			'as' => 'contents.index'
		]);

		Route::get('contents/{content}/edit',[
			'uses' => 'ContentsController@edit',
			'as' => 'contents.edit'
		]);

		Route::put('contents/{contents}', [
			'uses' => 'ContentsController@update',
			'as' => 'contents.update'
		]);

// routes of sliders
		Route::resource('sliders', 'SlidersController');
		Route::get('sliders/{id}/destroy', [
			'uses' => 'SlidersController@destroy',
			'as' => 'sliders.destroy'
		]);

		Route::post('sliders/updateorder',[
			'uses' => 'SlidersController@updateOrder',
			'as' => 'sliders.updateorder'
		]);

// routes of services
		Route::resource('services', 'ServicesController');
		Route::get('services/{id}/destroy', [
			'uses' => 'ServicesController@destroy',
			'as' => 'services.destroy'
		]);

		Route::post('services/updateorder', [
			'uses' => 'ServicesController@updateOrder',
			'as' => 'services.updateorder'
		]);

		Route::get('services/{id}/featured', [
			'uses' => 'ServicesController@featured',
			'as' => 'services.featured'
		]);


// routes of seos
		Route::get('seos',[
			'uses' => 'SeosController@index',
			'as' => 'seos.index'
		]);

		Route::get('seos/{id}/edit',[
			'uses' => 'SeosController@edit',
			'as' => 'seos.edit'
		]);

		Route::put('seos/update/{seos}',[
			'uses' => 'SeosController@update',
			'as' => 'seos.update'
		]);

// routes of settings
		Route::get('settings', [
			'uses' => 'SettingsController@index',
			'as' => 'settings.index'
		]);

		Route::put('settings/update/{settings}', [
			'uses' => 'SettingsController@update',
			'as' => 'settings.update'
		]);

// routes of contacts web
		Route::get('contacts/', [
			'uses' => 'ContactsController@index',
			'as' => 'contacts.index'
		]);

		Route::get('contacts/{id}/show', [
			'uses' => 'ContactsController@show',
			'as' => 'contacts.show'
		]);

		Route::get('contacts/{id}/destroy', [
			'uses' => 'ContactsController@destroy',
			'as' => 'contacts.destroy'
		]);

		Route::get('contacts/export/{section}', [
			'uses' => 'ContactsController@export',
			'as' => 'contacts.export'
		]);

		Route::post('update-status', [
			'uses' => 'ContactsController@statusContact',
			'as' => 'contacts.status'
		]);


// routes of members
		Route::resource('customers','CustomersController');

		Route::get('customers/{id}/destroy', [
			'uses' => 'CustomersController@destroy',
			'as' => 'customers.destroy'
		]);

// routes of users
		Route::resource('users','UsersController');

		Route::get('users/{id}/destroy', [
			'uses' => 'UsersController@destroy',
			'as' => 'users.destroy'
		]);

// route refresh contacts
		Route::post('refresh-contact', [
			'uses' => 'ContactsController@refreshContact',
			'as' => 'refresh.contacts'
		]);

// route validate refresh
		Route::post('validate-refresh', [
			'uses' => 'ContactsController@validateRefresh',
			'as' => 'validate.refresh'
		]);


	});




// routes of authentication admin
	Auth::routes();

	Route::get('/', [
		'uses' => 'Auth\LoginController@showLoginForm',
		'as' => 'admin.login'
	]);

	Route::get('login', [
		'uses' => 'Auth\LoginController@showLoginForm',
		'as' => 'login'
	]);

	Route::post('/login', [
		'uses' => 'Auth\LoginController@login',
		'as' => 'login.submit'
	]);

	Route::get('/logout', [
		'uses' => 'Auth\LoginController@logout',
		'as' => 'admin.logout'
	]);


});


// Routes of the members

Route::group(['prefix' => 'members'], function(){

// routes of members
	Route::resource('members', 'MembersController');

	Route::get('home',[
		'uses' => 'MembersController@index',
		'as' => 'members.index'
	]);

// routes of authentication admin
	Route::get('/',[
		'uses' => 'Auth\MemberLoginController@showLoginForm',
		'as' => 'members.login'
	]);

	Route::get('login',[
		'uses' => 'Auth\MemberLoginController@showLoginForm',
		'as' => 'members.login'
	]);

	Route::post('login',[
		'uses' => 'Auth\MemberLoginController@Login',
		'as' => 'members.login'
	]);

	Route::get('logout',[
		'uses' => 'Auth\MemberLoginController@logout',
		'as' => 'members.logout'
	]);

});
