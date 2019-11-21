<?php

use App\User;

use Illuminate\Support\Facades\Auth;

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
    return view('welcome2');
});

Route::resource('servicio','HelpCampController');

Auth::routes();

Route::get('/home','HelpCampController@index')->name('home');

Route::get('/verUser', 'VerUser@index');

Route::get('servicio/{slug}/pdf', ['as' => 'Servicio', 'uses' => 'HelpCampController@pdff']);

Route::get('/toggleActivo/{id}', function($id) {

	$user = User::where('id',$id)->get();

	if($user[0]->activo == 1) {
		$user[0]->activo = 0;
	} else {
		$user[0]->activo = 1;
	}

	$user[0]->save();
	return redirect('/verUser');
});

Route::get('/reservaciones', function() {
	if(Auth::check()) {
		return view('reservaciones');
	} else {
		return redirect('./login');
	}
});

Route::get("/noactivo", function() {
    return view('noactivo');
});



