<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecursoMController;
use App\Http\Controllers\GeneralController;
use App\Http\Controllers\root\UserstController;
use App\Http\Controllers\solicitudes\SolicitudController;

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

// Route::get('/',[LoginController::class,'__invoke']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/catalogo',[RecursoMController::class,'catalogo'])->name('catalogo');
Route::get('/proveedor',[RecursoMController::class,'proveedor'])->name('proveedor');
Route::get('/producto',[RecursoMController::class,'producto'])->name('producto');
Route::get('/producto/precios/{id}/',[RecursoMController::class,'precios'])->name('precios-producto');
Route::get('/requisiciones',[RecursoMController::class,'requisicionesP'])->name('requisiciones-rm');

Route::get('/solictud/requicision',[SolicitudController::class,'prerequicision'])->name('solicitud');
Route::get('/requisiciones/status',[GeneralController::class,'historial'])->name('h_requisiciones_gral');

Route::get('/root/users',[UserstController::class,'users'])->name('users');
Route::get('/root/users/create',[UserstController::class,'create'])->name('formusers');
Route::get('/root/users/update/{id}/',[UserstController::class,'update'])->name('formupdate');
