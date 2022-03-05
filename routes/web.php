<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;



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

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



 
  
Route::get('/reservation/{url}', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');
Route::post('/client.register', [App\Http\Controllers\Client\RegisterController::class, 'show'])->name('client.register');
Route::post('/client/create', [App\Http\Controllers\Client\RegisterController::class, 'create'])->name('client.create');
Route::get('/client/profile', [App\Http\Controllers\Client\ProfileController::class, 'edit'])->name('client.profile');


Route::get('/client.logout', [App\Http\Controllers\Client\LogoutController::class,'client_logout'])->name('client.logout');
Route::get('/lan', function(){
	return view('reservation.landing');
})->name('lan');

Route::get('/client/login', [App\Http\Controllers\Client\LoginController::class, 'index'])->name('client.login');




Route::put('/users/{id}', [App\Http\Controllers\ClientController::class, 'update']);
 





Route::get('/lop',[App\Http\Controllers\Client\LoginController::class, 'back'])->name('lop');


Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::get('profile/{admin}', ['as' => 'profile.edit_user_by_sup_admin', 'uses' => 'App\Http\Controllers\ProfileController@edit_user_by_sup_admin']);
	// Route::put('profile/{admin}', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update_user_by_sup_admin']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


Route::post('profile.edit','App\Http\Controllers\ProfileController@edit_user_by_sup_admin');
