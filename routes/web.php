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


 
  
Route::get('/reservation/{url}', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');


// Client
Route::get('/client.register', [App\Http\Controllers\Client\RegisterController::class, 'show'])->name('client.register');
Route::group(['middleware' => 'auth'], function () {
	Route::post('/client/create', [App\Http\Controllers\Client\RegisterController::class, 'create'])->name('client.create');
	Route::get('/client/profile', [App\Http\Controllers\Client\ProfileController::class, 'edit'])->name('client.profile');
	Route::put('/client/profile/update', [App\Http\Controllers\Client\ProfileController::class, 'update'])->name('client.profile.update');
	Route::get('/rendezvous/create', [App\Http\Controllers\RendezVousController::class, 'store'])->name('rendezvous.create');
	Route::get('/rendezvous/pdf', [App\Http\Controllers\RendezVousController::class, 'pdf'])->name('rendez_vous.pdf');
});

// Route::get('/mail', [App\Http\Controllers\MailController::class, 'sendEmail'])->name('mail');

// Route::get('/reservation_login', function(){
// 	return view('reservation.login');
// })->name('reservation_login');
Route::get('/reservation_login', [App\Http\Controllers\Client\LoginController::class, 'index'])->name('reservation_login');



Route::get('/rendezvous/search', [App\Http\Controllers\RendezVousController::class, 'search'])->name('rendezvous.search');



Route::get('/test', function(){
	
	return view('reservation.test2');
})->name('test');



Route::get('/client.logout', [App\Http\Controllers\Client\LogoutController::class,'client_logout'])->name('client.logout');
Route::get('/lan', function(){
	return view('reservation.landing');
})->name('lan');

Route::get('/client/login', [App\Http\Controllers\Client\LoginController::class, 'index'])->name('client.login');


Route::put('/user/{id}', [App\Http\Controllers\ClientController::class, 'update']);
 



Route::get('/lop',[App\Http\Controllers\Client\LoginController::class, 'back'])->name('lop');


Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');


// User
Route::group(['middleware' => 'auth'], function () {
	Route::get('/rendez-vous.index', 'App\Http\Controllers\RendezVousController@index')->name('rendez-vous.index');
	Route::get('/rendez_vous.annuler/{id}', 'App\Http\Controllers\RendezVousController@annuler');
	Route::get('/rendez_vous.Confirmer/{id}', 'App\Http\Controllers\RendezVousController@Confirmer');
});






// Admin
Route::group(['middleware' => 'auth'], function () {
	Route::get('/admin/profile/edit',[App\Http\Controllers\ProfileController::class, 'admin_edit'])->name('admin.profile.edit');
	Route::put('/admin/profile/update',[App\Http\Controllers\ProfileController::class, 'admin_update'])->name('admin.profile.update');
	Route::get('/admin/user_management',[App\Http\Controllers\EtablissementController::class, 'index'])->name('admin.user_management');
});





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::get('profile/{admin}', ['as' => 'profile.edit_user_by_sup_admin', 'uses' => 'App\Http\Controllers\ProfileController@edit_user_by_sup_admin']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


// Route::post('profile.edit','App\Http\Controllers\ProfileController@edit_user_by_sup_admin');
