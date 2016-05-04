<?php


Route::group(['middleware' => 'admin', 'prefix' => 'admin', 'namespace' => 'Modules\Admin\Http\Controllers'], function()
{
	//Auth Routes
	Route::get('/login', 'AdminController@login');
	Route::post('/login', 'AdminController@postLogin');
	Route::get('/logout', 'AdminController@logout');
	Route::post('/password/email', 'PasswordAdminController@sendResetLinkEmail');
	Route::get('/password/reset', 'PasswordAdminController@showResetForm');
	Route::post('/password/resetPassword','PasswordAdminController@resetInit');
	Route::get('/password/reset/{token}', 'PasswordAdminController@showResetForm');

	Route::group(['middleware' => 'adminAuth:admin'], function(){
			Route::get('/auth', 'AdminController@index');

			Route::get('/', 'DashboardController@index');


			// Messages routes
			Route::get('/messages', 'MessagesController@index');
			Route::post('/messages/getMessage/{id}', 'MessagesController@getMessage');
			Route::post('/messages/sendmail/', 'MessagesController@sendMail');

			// Pages Routes
			Route::get('/pages', 'PagesController@index');
			Route::get('/pages/view/{id}', 'PagesController@show');
			Route::get('/pages/add', 'PagesController@add');
			Route::post('/pages/store', 'PagesController@store');
			Route::get('/pages/edit/{id}', 'PagesController@edit');
			Route::put('/pages/update/{id}', 'PagesController@update');
			Route::get('/pages/destroy/{id}', 'PagesController@destroy');

			// Posts Routes
			Route::get('/posts', 'PostsController@index');
			Route::get('/posts/view/{id}', 'PostsController@show');
			Route::get('/posts/add', 'PostsController@add');
			Route::post('/posts/store', 'PostsController@store');
			Route::get('/posts/edit/{id}', 'PostsController@edit');
			Route::put('/posts/update/{id}', 'PostsController@update');
			Route::get('/posts/destroy/{id}', 'PostsController@destroy');

			// Post's Categories Routes
			Route::get('/post-categories', 'PostCategoriesController@index');
			Route::get('/post-categories/view/{id}', 'PostCategoriesController@show');
			Route::get('/post-categories/add', 'PostCategoriesController@add');
			Route::post('/post-categories/store', 'PostCategoriesController@store');
			Route::get('/post-categories/edit/{id}', 'PostCategoriesController@edit');
			Route::put('/post-categories/update/{id}', 'PostCategoriesController@update');
			Route::get('/post-categories/destroy/{id}', 'PostCategoriesController@destroy');

			// Tag's Routes
			Route::get('/tags', 'TagsController@index');
			Route::get('/tags/view/{id}', 'TagsController@show');
			Route::get('/tags/add', 'TagsController@add');
			Route::post('/tags/store', 'TagsController@store');
			Route::get('/tags/edit/{id}', 'TagsController@edit');
			Route::put('/tags/update/{id}', 'TagsController@update');
			Route::get('/tags/destroy/{id}', 'TagsController@destroy');

			// Banner's Routes
			Route::get('/banners', 'BannersController@index');
			Route::get('/banners/upload', 'BannersController@upload');
			Route::get('/banners/view/{id}', 'BannersController@show');
			Route::get('/banners/add', 'BannersController@add');
			Route::post('/banners/store', 'BannersController@store');
			Route::get('/banners/edit/{id}', 'BannersController@edit');
			Route::put('/banners/update/{id}', 'BannersController@update');
			Route::get('/banners/destroy/{id}', 'BannersController@destroy');

			// Admin Users Routes, Model: Admin
			Route::get('/users', 'AdminController@index');
			Route::get('/users/view/{id}', 'AdminController@show');
			Route::get('/users/add', 'AdminController@add');
			Route::post('/users/store', 'AdminController@store');
			Route::get('/users/edit/{id}', 'AdminController@edit');
			Route::put('/users/update/{id}', 'AdminController@update');
			Route::get('/users/destroy/{id}', 'AdminController@destroy');
			Route::get('/users/config/{id}', 'AdminController@config');
			Route::post('/users/update-config/{id}', 'AdminController@postConfig');
	});


	Route::get('/images/{image}', function($image = null)
	{
	    $path = storage_path().'/' . $image;
	    if (file_exists($path)) {
	        return Response::download($path);
	    }
	});

});
