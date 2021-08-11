<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserrolesController;
use App\Http\Controllers\ProfileController;
use App\Models\Userroles;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'App\Http\Controllers\PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'App\Http\Controllers\PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'App\Http\Controllers\PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'App\Http\Controllers\PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'App\Http\Controllers\PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'App\Http\Controllers\PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'App\Http\Controllers\PageController@upgrade']);

		//Post Related routes
		Route::get('/post',[PageController::class,'post'])->name('post');
		Route::resource('posts',PostController::class);

		Route::get('/search',[SearchController::class,'search'])->name('search');

		//User Management routes
		Route::get('/users',[UserrolesController::class,'index'])->name('usersrole');
		Route::get('/users/registration',[UserrolesController::class,'userregistration'])->name('userregistration');
		Route::get('/users/admindata',[UserrolesController::class,'admindata'])->name('admindata');
		Route::get('/users/userdata',[UserrolesController::class,'userdata'])->name('userdata');
		Route::get('/users/edit/{id}',[UserrolesController::class,'edituser'])->name('edituser');
		Route::put('/users/update/{id}',[UserrolesController::class,'updateuser'])->name('updateuser');

		//user registration
		Route::post('/users/registration',[UserrolesController::class,'saveuserdata'])->name('saveuser');
		Route::get('users/viewprofile/{id}',[UserrolesController::class,'viewuserdetail'])->name('viewuserdetail');

		Route::put('profile/update/{id}',[ProfileController::class,'update'])->name('updateprofile');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

