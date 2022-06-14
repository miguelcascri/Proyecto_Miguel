<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\MesasController;
use App\Http\Controllers\ComentController;
use App\Http\Controllers\UserController;
use App\Models\comentarios;

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


Auth::routes();
// Route::get('/admin/home', 'LoginController@redirectPath()')->name('adminhome');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\ClientesController::class, 'indexComentpublic'])->name('/');


Route::get('/client', function () {
    return view('client');
});

Route::get('/reserva', function () {
    return view('reserva');
});

Route::get('/carta', function () {
    return view('carta');
});

Route::get('/contact', function () {
    return view('contact');
});




Route::get('/clientes', function () {
    return view('admin/adminclientes');
});
Route::get('/coments', function () {
    return view('admin/adminComents');
});

Route::get('/mesas', function () {
    return view('admin/adminmesas');
});

Route::get('/formreserva', function () {
    return view('formreserva');
});

Route::get('/admin', function () {
    return view('auth/login');
});

Route::get('editreserve', function () {
    return view('admin/editreserve');
});

Route::get('PDF', function () {
    return view('myPDF');
});





/** RUTAS LOGIN Y LOGOUT */
Route::get('/logout', [App\Http\Controllers\logoutController::class, 'perform'])->name('logout');



/**
 * RUTAS DE ADMIN
 */
Route::get('/admin/home/', [App\Http\Controllers\HomeController::class, 'index'])->name('adminhome');
// Route::get('/admin/home/', [App\Http\Controllers\ReservasController::class, 'indexhome'])->name('adminhome');

Route::get('/home', function () {return view('admin/home');});

Route::get('/admin/adminreservas/', [App\Http\Controllers\ReservasController::class, 'index'])->name('adminreservas');
Route::get('/admin/adminclientes/', [App\Http\Controllers\ReservasController::class, 'indexclient'])->name('adminclientes');
Route::get('/admin/adminmesas/', [App\Http\Controllers\MesasController::class, 'index'])->name('adminmesas');
Route::post('/coments', [App\Http\Controllers\ClientesController::class, 'storeComent'])->name('comentarios');
Route::get('/admin/admincoments/', [App\Http\Controllers\ReservasController::class, 'indexComent'])->name('admincoments');
Route::post('/admin/adminclientes/buscar',[App\Http\Controllers\ReservasController ::class, 'buscar_show']);
Route::post('/admin/adminclientes/buscar',[App\Http\Controllers\ReservasController ::class, 'buscar_reservas']);
Route::post('/admin/adminmesas', [MesasController::class, 'store'])->name('crearmesa');
Route::get('/admin/adminreservas/{id}',[App\Http\Controllers\ReservasController ::class, 'editreserve'])->name('editreserve');
Route::post('/admin/UpdateReserva/{id}',[App\Http\Controllers\ReservasController ::class, 'updateReserve'])->name('UpdateReserva');

Route::post('/admin/adminreserve/{id}',[App\Http\Controllers\ReservasController ::class, 'deletereserve'])->name('deletereserve');
Route::get('/admin/updatemesa/{id}',[App\Http\Controllers\MesasController ::class, 'updatemesa'])->name('updatemesa');
Route::post('/admin/editmesa/{id}',[App\Http\Controllers\MesasController ::class, 'editmesa'])->name('editmesa');
Route::post('/admin/deletecoment/{id}',[App\Http\Controllers\ReservasController ::class, 'deletecoment'])->name('deletecoment');


Route::post('/admin/UpdateClient/{id}',[App\Http\Controllers\ReservasController ::class, 'updateClient'])->name('UpdateClient');
Route::get('/admin/adminclient/{id}',[App\Http\Controllers\ReservasController ::class, 'editClient'])->name('editClient');
Route::post('/admin/adminclient/{id}',[App\Http\Controllers\ReservasController ::class, 'deleteclient'])->name('deleteclient');



Route::post('/admin/adminmesas/{id}',[App\Http\Controllers\MesasController ::class, 'deletemesa'])->name('deletemesa');
Route::get('/admin/adminmesas/{id}',[App\Http\Controllers\MesasController ::class, 'reservemesas'])->name('reservemesas');



/**
 *  VISTA GENERAL
 */

Route::post('/client', [ClientesController::class, 'store'])->name('crearclient');
Route::post('/reserva', [ClientesController::class, 'disponibilidad'])->name('disponibilidad');
Route::post('/formreserva', [ClientesController::class, 'store'])->name('crearreserva');
// Route::get('/contact', [ComentController::class, 'store'])->name('crearcoment');



Route::get('generate-pdf/{reference}', [ClientesController::class, 'generatePDF']) -> name ('generarPDF');
