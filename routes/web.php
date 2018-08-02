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

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	],
	function()
	{
		/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

		Route::get('/', 'IndexController@index');
		Route::get('contacts', 'IndexController@contacts');
		Route::get('blog', 'IndexController@blog');
		Route::get('blog/{slug}', 'IndexController@oneBlog');
		Route::get('blogMore', 'IndexController@blogMore');
		Route::get('client', 'IndexController@client');
		Route::get('client/{slug}', 'IndexController@oneClient');
		Route::get('clientMore', 'IndexController@clientMore');
		Route::get('service', 'IndexController@service');
		Route::get('service/{slug}', 'IndexController@oneService');
		Route::get('portfolio', 'IndexController@portfolio');
		Route::get('portfolio/{slug}', 'IndexController@onePortfolio');
		Route::get('portfolioMore', 'IndexController@portfolioMore');
		Route::get('portfolio/category/{slug}', 'IndexController@category');
		Route::get('categoryMore', 'IndexController@categoryMore');
		Route::get('search', 'IndexController@search');
		Route::get('searchBlog', 'IndexController@searchBlog');
		Route::get('workshop', 'IndexController@workshop');
		Route::get('send','IndexController@send');
		Route::post('send','IndexController@send');

	});
Route::group([
	'prefix' => 'admin-panel',
	'middleware' => ['web', 'auth',],
	'namespace' => 'Admin'
], function (){
	
	Route::resource('blog', 'BlogController');
	Route::resource('sliders', 'SliderController');
	Route::resource('benefits', 'BenefitsController');
	Route::resource('client', 'ClientController');
	Route::resource('service', 'ServiceController');
	Route::resource('portfolio', 'PortfolioController');
	Route::resource('category', 'CategoryController');
	Route::match(['get', 'post'], 'ware', 'AdminController@ware');
	Route::match(['get', 'post'], 'contacts', 'AdminController@contacts');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
