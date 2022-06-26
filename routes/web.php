<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EtablissementController;
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



// Auth::routes();






// --------------------------------------Client-----------------------------------------------------------
// lol Route::get('/client.register', [App\Http\Controllers\Client\RegisterController::class, 'show'])->name('client.register');
// lol Route::group(['middleware' => 'auth'], function () {
// lol 	Route::post('/client/create', [App\Http\Controllers\Client\RegisterController::class, 'create'])->name('client.create');
// });




Route::get('/reservation_login', [App\Http\Controllers\Client\LoginController::class, 'index'])->name('reservation_login');



// Route::get('/rendezvous/search', [App\Http\Controllers\RendezVousController::class, 'search'])->name('rendezvous.search');





 





Auth::routes();



// -----------------------------------User--------------------------------------------------------------------
// Route::group(['middleware' => 'auth'], function () {
	// Route::get('/rendez-vous.index', 'App\Http\Controllers\RendezVousController@index')->name('rendez-vous.index');
	// Route::get('/rendez-vous.history', 'App\Http\Controllers\RendezVousController@history')->name('rendez-vous.history');
	// Route::get('/rendez-vous.today_rendez_vous', 'App\Http\Controllers\RendezVousController@today_rendez_vous')->name('rendez-vous.today_rendez_vous');
	// Route::get('/rendez_vous.annuler/{id}', [App\Http\Controllers\RendezVousController::class, 'user_annuler_rdv'])->name('rendez_vous.annuler');
	
	// Route::get('/user.rendez_vous.Confirmer/{id}', 'App\Http\Controllers\RendezVousController@confirmer');
	// Route::get('/rendez_vous.list.pdf', 'App\Http\Controllers\RendezVousController@rendez_vous_list_pdf')->name('rendez_vous.list.pdf');

// });






// ------------------------------------Admin-------------------------------------------------------------------
// Route::group(['middleware' => 'auth'], function () {
	// Route::get('/admin/profile/edit',[App\Http\Controllers\ProfileController::class, 'admin_edit'])->name('admin.profile.edit');
	// Route::put('/admin/profile/update',[App\Http\Controllers\ProfileController::class, 'admin_update'])->name('admin.profile.update');
	// Route::get('/admin/user_management',[App\Http\Controllers\EtablissementController::class, 'index'])->name('admin.user_management');
// });









// ------------------------Originale----------------------------------------------------------------------------
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
// 	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
// 	 Route::get('map', function () {return view('pages.maps');})->name('map');
// 	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
// 	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
// });
// ------------------------- Fin Originala---------------------------------------------------------------------------


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('user')->name('user.')->group(function(){

	Route::middleware(['guest:web','PreventBackHstory'])->group(function(){
		Route::view('/login','users.login')->name('login');
		Route::view('/register','users.register')->name('register');
		Route::post('/create',[UserController::class,'create'])->name('create');
		Route::post('/check',[UserController::class,'check'])->name('check');
	});

	Route::middleware(['auth:web','PreventBackHstory'])->group(function(){
		Route::get('/home', [UserController::class, 'home'])->name('home');
		Route::post('/logout',[UserController::class,'logout'])->name('logout');
		Route::get('/rendez-vous.index', [RendezVousController::class, 'index'])->name('rendez-vous.index');
		Route::get('profile.edit',[ ProfileController::class ,'edit'])->name('profile.edit');
		Route::get('/rendez-vous.history',[ RendezVousController::class ,'history'])->name('rendez-vous.history');
		Route::get('/rendez-vous.today_rendez_vous', [RendezVousController::class, 'today_rendez_vous'])->name('rendez-vous.today_rendez_vous');
		Route::get('rendez_vous.list.pdf',[ RendezVousController::class ,'rendez_vous_list_pdf'])->name('rendez_vous.list.pdf');
		Route::get('client.management',[UserController::class ,'client_management'])->name('client.management');
		Route::put('profile.update', [ProfileController::class, 'update'])->name('profile.update');
		Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
		Route::get('rendez_vous/confirmer/{id}',[ RendezVousController::class ,'confirmer']);		
		Route::get('rendez_vous/annuler/{id}', [ RendezVousController::class, 'user_annuler_rdv']);
		Route::get('reservation/{url}', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');
	

	});

});



Route::prefix('admin')->name('admin.')->group(function(){

	Route::middleware(['guest:admin','PreventBackHstory'])->group(function(){
		Route::view('/login','admin.login')->name('login');
		Route::post('/check',[AdminController::class,'check'])->name('check');
	});
	
	Route::middleware(['auth:admin','PreventBackHstory'])->group(function(){
		Route::get('/home', [AdminController::class,'home'])->name('home');
		Route::post('/logout',[AdminController::class,'logout'])->name('logout');
		Route::get('profile/edit',[ProfileController::class, 'admin_edit'])->name('profile.edit');
		Route::put('profile/update',[ProfileController::class, 'admin_update'])->name('profile.update');
		Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
		Route::get('/user_management',[EtablissementController::class, 'index'])->name('user_management');
		Route::put('/user/{id}', [EtablissementController::class, 'update']);
		
	});

});




Route::get('/reservation/{url}', [App\Http\Controllers\ReservationController::class, 'index'])->name('reservation');

Route::prefix('client')->name('client.')->group(function(){

	Route::middleware(['guest:client','PreventBackHstory'])->group(function(){
		Route::get('/login', [ClientController::class, 'login'])->name('login');
		Route::get('/register',[ClientController::class,'register'])->name('register');
		Route::post('/create',[ClientController::class,'create'])->name('create');
		Route::post('/check',[ClientController::class,'check'])->name('check');
	});

	Route::middleware(['auth:client','PreventBackHstory'])->group(function(){
		Route::get('/home', [ClientController::class, 'home'])->name('home');
		Route::get('/logout',[ClientController::class,'logout'])->name('logout');
		Route::get('/profile', [ClientController::class, 'edit'])->name('profile');
		Route::get('/rendezvous/create', [RendezVousController::class, 'store'])->name('rendezvous.create');
		Route::get('/rendezvous/pdf', [RendezVousController::class, 'pdf'])->name('rendez_vous.pdf');
		Route::get('/rendez_vous.annuler/{id}', [RendezVousController::class, 'annuler'])->name('rendez_vous.annuler');
		Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
		Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
	
	});
	
});










// ****************** Tests ***************************************

// Route::get('/test', function(){
	
// 	return view('reservation.lol');
// })->name('test');


// Route::get('/lan', function(){
// 	return view('reservation.landing');
// })->name('lan');



Route::get('lol',function(){
	return view('errors.site');
});


// Route::get('/lop',[App\Http\Controllers\Client\LoginController::class, 'back'])->name('lop');
