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
Route::group(['middleware' => ['web']], function() {
	Route::get('/', 'PagesController@getHome')->name('home');
	Route::get('home', 'PagesController@getHome')->name('home');

	Route::get('news', 'PagesController@getNews')->name('news');

	Route::get('contact', 'PagesController@getContact')->name('contact');

	Route::get('login', 'LoginController@getLogin')->name('login')->middleware('guest');
	Route::post('login', 'LoginController@postLogin');

	Route::get('logout', 'LoginController@getLogout')->name('logout')->middleware('auth');

	Route::get('register', 'LoginController@getRegister')->name('register')->middleware('guest');
	Route::post('register', 'LoginController@postRegister');

	Route::get('post/{id}/detail', 'PagesController@getDetailPost')->name('post.detail');

	Route::get('search', 'SearchController@getSearch')->name('search');

	Route::group(['prefix' => 'list'], function() {
		Route::get('{idKhoaHoc_LuyenThi}', 'PagesController@getListPostByKhoaHocLuyenThi')->name('list.postByCategory');
	});

	Route::get('image/list', 'PagesController@getListImage')->name('image.list');

	// Reset password routes.
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
	Route::get('password/reset/{token?}', 'ResetPasswordController@showResetForm');
	Route::post('password/reset', 'ResetPasswordController@reset');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail');
	// End
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function() {
	Route::get('profile/{id}', 'PagesController@getProfileUser')->name('profileUser');
	Route::get('update/{id}', 'UserController@getUpdateUser')->name('updateInfo');
	Route::post('update{id}', 'UserController@postUpdateUser');
	Route::get('changepassword/{id}', 'UserController@getChangePassword')->name('changepassword');
	Route::post('changepassword/{id}', 'UserController@postChangePassword');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
	Route::get('home', 'AdminController@getHome')->name('admin.home');

	Route::get('gioithieu-dangky/edit', 'AdminController@getGioiThieuDangKy')->name('admin.gioithieu-dangky.edit');
	Route::post('gioithieu-dangky/edit', 'AdminController@postGioiThieuDangKy');

	// Tầm nhìn - sứ mệnh - cốt lõi.
	Route::get('tamnhin/edit', 'AdminController@getTamnhin')->name('tamnhin');
	Route::post('tamnhin/edit', 'AdminController@postTamnhin');

	Route::get('sumenh/edit', 'AdminController@getSumenh')->name('sumenh');
	Route::post('sumenh/edit', 'AdminController@postSumenh');

	Route::get('cotloi/edit', 'AdminController@getCotloi')->name('cotloi');
	Route::post('cotloi/edit', 'AdminController@postCotloi');
	// End

	// Khóa học.
	Route::group(['prefix' => 'daotao'], function() {
		Route::get('edit/{id}', 'AdminController@getEditDaoTao')->name('admin.khoahoc.edit');
		Route::post('edit/{id}', 'AdminController@postEditDaoTao');

		Route::get('add', 'AdminController@getAddKhoaHoc')->name('admin.khoahoc.add');
		Route::post('add', 'AdminController@postAddKhoaHoc');

		Route::get('delete/{id}', 'AdminController@getDeleteKhoaHoc')->name('admin.khoahoc.delete');
	});
	// End

	// Users
	Route::group(['prefix' => 'user'], function() {
		Route::get('list', 'UserController@getListUser')->name('admin.users.list');

		Route::get('delete/{id}', 'UserController@getDelete')->name('admin.user.delete');

		Route::get('{id}/setadmin', 'UserController@getSetAdmin')->name('admin.user.setadmin');

		Route::get('{id}/cancel', 'UserController@getCancelAdmin')->name('admin.user.cancel');

		Route::get('{id}/active', 'UserController@getActive')->name('admin.user.active');
		Route::get('{id}/cancel-active', 'UserController@getCancelActive')->name('admin.user.cancel-active');
	});
	// End

	// News
	Route::group(['prefix' => 'post'], function() {
		Route::get('list', 'PostController@getListPostAdmin')->name('admin.post.list');

		Route::get('add', 'PostController@getAddPostAdmin')->name('admin.post.add');
		Route::post('add', 'PostController@postAddPostAdmin');

		Route::get('delete/{id}', 'PostController@getDeletePostAdmin')->name('admin.post.delete');

		Route::get('edit/{id}', 'PostController@getEditPostAdmin')->name('admin.post.edit');
		Route::post('edit/{id}', 'PostController@postEditPostAdmin')->name('admin.post.edit');
	});
	// End

	// Slogan
	Route::group(['prefix' => 'slogan'], function() {
		Route::get('list', 'SloganController@getSlogan')->name('admin.slogan.list');
		Route::post('list', 'SloganController@postSlogan');

		Route::get('delete/{id}', 'SloganController@getDeleteSlogan')->name('admin.slogan.delete');

		Route::get('apply/{id}', 'SloganController@getApplySlogan')->name('admin.slogan.apply');
		Route::post('apply/{id}', 'SloganController@postApplySlogan');
	});
	// End

	Route::get('contact', 'AdminController@getContact')->name('admin.contact.edit');
	Route::post('contact', 'AdminController@postContact');

	Route::group(['prefix' => 'image'], function() {
		Route::get('list', 'ImageController@getListImage')->name('admin.image.list');
		Route::post('list', 'ImageController@postListImage');
		Route::get('delete/{id}', 'ImageController@getDeleteImage')->name('admin.image.delete');
	});
});
