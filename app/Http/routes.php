<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/

Route::get('cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});


Route::group(['namespace' => 'App', 'prefix' => 'app'], function () {

  Route::get('/', 'IndexController@index');

  Route::get('dashboard', 'DashboardController@index');

  Route::get('pqrs', 'DashboardController@pqrs_page');

  Route::post('pqrs', 'DashboardController@pqrs_sendemail');

  Route::get('projects','DashboardController@projectslist');

  Route::get('credits/{id}','DashboardController@usercredits');

  Route::get('credit/{id}','DashboardController@showcredit');

  Route::get('commissions/{id}','DashboardController@showcommissions');

  Route::get('project/{id}','DashboardController@showproject');

  Route::get('logout', 'IndexController@logout');

  Route::get('aportes','IndexController@aportes');

  Route::get('ladrillos','IndexController@ladrillos');

  Route::get('network/{id}','DashboardController@network');

  Route::get('properties','PropertiesController@index');

  Route::get('addeditproperty','PropertiesController@addeditproperty');

  Route::post('addeditproperty', 'PropertiesController@addnew');

  Route::get('addeditproperty/{id}', 'PropertiesController@editproperty');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

	Route::get('/', 'IndexController@index');

	Route::post('login', 'IndexController@postLogin');


	Route::get('logout', 'IndexController@logout');

	Route::get('dashboard', 'DashboardController@index');

	Route::get('profile', 'AdminController@profile');

	Route::post('profile', 'AdminController@updateProfile');

	Route::post('profile_pass', 'AdminController@updatePassword');

	Route::get('settings', 'SettingsController@settings');

	Route::post('settings', 'SettingsController@settingsUpdates');

	Route::post('social_links', 'SettingsController@social_links_update');

	Route::post('addthisdisqus', 'SettingsController@addthisdisqus');

	Route::post('about_us', 'SettingsController@about_us_page');

  Route::post('comissions', 'SettingsController@comissions');

	Route::post('careers_with_us', 'SettingsController@careers_with_us_page');

	Route::post('terms_conditions', 'SettingsController@terms_conditions_page');

	Route::post('privacy_policy', 'SettingsController@privacy_policy_page');

	Route::post('headfootupdate', 'SettingsController@headfootupdate');

	Route::get('slider', 'SliderController@sliderlist');

	Route::get('slider/addslide', 'SliderController@addeditSlide');

	Route::post('slider/addslide', 'SliderController@addnew');

	Route::get('slider/addslide/{id}', 'SliderController@editSlide');

	Route::get('slider/delete/{id}', 'SliderController@delete');


	Route::get('testimonials', 'TestimonialsController@testimonialslist');

	Route::get('testimonials/addtestimonial', 'TestimonialsController@addeditestimonials');

	Route::post('testimonials/addtestimonial', 'TestimonialsController@addnew');

	Route::get('testimonials/addtestimonial/{id}', 'TestimonialsController@edittestimonial');

	Route::get('testimonials/delete/{id}', 'TestimonialsController@delete');


	Route::get('properties', 'PropertiesController@propertieslist');

	Route::get('properties/addproperty', 'PropertiesController@addeditproperty');

	Route::post('properties/addproperty', 'PropertiesController@addnew');

	Route::get('properties/addproperty/{id}', 'PropertiesController@editproperty');

	Route::get('properties/status/{id}', 'PropertiesController@status');

	Route::get('properties/featuredproperty/{id}', 'PropertiesController@featuredproperty');

	Route::get('properties/delete/{id}', 'PropertiesController@delete');


	Route::get('featuredproperties', 'FeaturedPropertiesController@propertieslist');


	Route::get('users', 'UsersController@userslist');

	Route::get('users/adduser', 'UsersController@addeditUser');

	Route::post('users/adduser', 'UsersController@addnew');

	Route::get('users/adduser/{id}', 'UsersController@editUser');

  Route::get('users/profile/{id}', 'UsersController@userprofile');

  Route::get('users/profile/credit/delete/{credit_id}/{user_id}', 'CreditsController@deleteUserCredit');

  Route::get('users/download/{id}', 'UsersController@exportUser');

	Route::get('users/addcsv', 'UsersController@viewcsv');

	Route::post('users/addcsv', 'UsersController@addcsv');

  Route::get('transacciones', 'UsersController@transacciones');

  Route::get('transacciones/delete/{id}', 'UsersController@deletetransaccion');

  Route::get('user/credits/{id}', 'CreditsController@credits');



  Route::get('user/addcommission/{id}','UsersController@commission');

  Route::post('user/addcommission/{id}', 'UsersController@addCommission');

  Route::get('user/credit/{user_id}/{credit_id}', 'CreditsController@new_usercredit');

	Route::get('users/delete/{id}', 'CreditsController@delete');


  Route::get('credits', 'CreditsController@creditslist');

  Route::get('credits/addcredit', 'CreditsController@addeditCredit');

  Route::post('credits/addcredit', 'CreditsController@addCredit');

  Route::get('credits/edit/{id}', 'CreditsController@editCredit');

  Route::post('credits/editar', 'CreditsController@addCredit');

  Route::get('credits/delete/{id}', 'CreditsController@delete');


  Route::get('projects', 'ProjectsController@projectslist');

  Route::get('projects/addproject', 'ProjectsController@addeditProject');

  Route::post('projects/addcredit', 'ProjectsController@addProject');

  Route::get('projects/edit/{id}', 'ProjectsController@editProject');

  Route::post('projects/editar', 'ProjectsController@addProject');

  Route::get('projects/delete/{id}', 'ProjectsController@delete');


	Route::get('cities', 'CityController@citylist');

	Route::get('cities/addcity', 'CityController@addeditcity');

	Route::post('cities/addcity', 'CityController@addnew');

	Route::get('cities/addcity/{id}', 'CityController@editcity');

	Route::get('cities/delete/{id}', 'CityController@delete');

	Route::get('cities/status/{id}', 'CityController@status');



	Route::get('subscriber', 'SubscriberController@subscriberlist');

	Route::get('subscriber/delete/{id}', 'SubscriberController@delete');


	Route::get('partners', 'PartnersController@partnerslist');

	Route::get('partners/addpartners', 'PartnersController@addpartners');

	Route::post('partners/addpartners', 'PartnersController@addnew');

	Route::get('partners/addpartners/{id}', 'PartnersController@editpartners');

	Route::get('partners/delete/{id}', 'PartnersController@delete');

	Route::get('inquiries', 'InquiriesController@inquirieslist');

	Route::get('inquiries/delete/{id}', 'InquiriesController@delete');


  	Route::get('bricks', 'BricksController@brickslist');

  	Route::get('bricks/addbricks', 'BricksController@addeditbricks');

		Route::post('bricks/addproduct', 'BricksController@addproduct');

		Route::post('bricks/editar', 'BricksController@addproduct');

		Route::get('bricks/edit/{id}', 'BricksController@edit');

		Route::get('bricks/delete/{id}', 'BricksController@delete');

		Route::get('blog','BlogController@index');

		Route::get('blog/addblogs','BlogController@create');

		Route::get('blog/edit/{id}','BlogController@edit');

		Route::post('blog/addblogs','BlogController@store');


    Route::get('news','NewsController@index');

    	Route::get('news/addnews','NewsController@create');

    Route::get('news/edit/{id}','NewsController@edit');

    Route::post('news/addnews','NewsController@store');


	Route::get('types', 'TypesController@typeslist');

	Route::get('types/addtypes', 'TypesController@addedittypes');

	Route::get('types/addtypes', 'TypesController@addedittypes');

	Route::post('types/addtypes', 'TypesController@addnew');

	Route::get('types/addtypes/{id}', 'TypesController@edittypes');

	Route::get('types/delete/{id}', 'TypesController@delete');

});

Route::get('/', 'IndexController@index');

Route::get('about-us', 'IndexController@aboutus_page');

Route::get('verificar-transacciones','IndexController@verificarTransacciones');

Route::get('credits', 'IndexController@careers_with_page');


Route::get('blog', 'IndexController@blog');

Route::get('articulo/{id}', 'IndexController@article');

Route::get('profile', 'IndexController@profile');

Route::get('transactions', 'IndexController@transactions');


Route::get('careers-with-us', 'IndexController@careers_with_page');

Route::get('terms-conditions', 'IndexController@terms_conditions_page');

Route::get('privacy-policy', 'IndexController@privacy_policy_page');

Route::get('contact-us', 'IndexController@contact_us_page');

Route::post('contact-us', 'IndexController@contact_us_sendemail');


Route::get('/', 'IndexController@index');

Route::post('subscribe', 'IndexController@subscribe');

Route::get('agents', 'AgentsController@index');

Route::get('builders', 'AgentsController@builder_list');

Route::get('properties', 'PropertiesController@index');

Route::get('store', 'StoreController@view_all');

Route::get('store/{id}', 'StoreController@view_one');

Route::get('store/buy/{id}', 'StoreController@buy');

Route::get('verificar/', 'StoreController@verificar');

Route::get('api', 'StoreController@EstadoTransacciones');

Route::get('sale', 'PropertiesController@saleproperties');

Route::get('rent', 'PropertiesController@rentproperties');

Route::get('properties/{slug}', 'PropertiesController@propertysingle');

Route::get('type/{slug}', 'PropertiesController@propertiesbytype');

Route::post('agentscontact', 'PropertiesController@agentscontact');

Route::post('searchproperties', 'PropertiesController@searchproperties');

Route::post('search', 'PropertiesController@searchkeywordproperties');



Route::get('login', 'IndexController@login');

Route::post('login', 'IndexController@postLogin');

Route::get('register', 'IndexController@register');

Route::post('register', 'IndexController@postRegister');

Route::get('logout', 'IndexController@logout');

// Password reset link request routes...
Route::get('admin/password/email', 'Auth\PasswordController@getEmail');

Route::post('admin/password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('admin/password/reset/{token}', 'Auth\PasswordController@getReset');

Route::post('admin/password/reset', 'Auth\PasswordController@postReset');

Route::get('auth/confirm/{code}', 'IndexController@confirm');

//Route::post('users/login', 'Auth\AuthController@postLogin');
