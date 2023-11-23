<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/formularioAgregarEmpleado', [EmpleadoController::class, 'create'])->name('formularioAgregarEmpleado');
    Route::post('/agregarEmpleado', [EmpleadoController::class, 'store']);
    Route::get('/listarEmpleados', [EmpleadoController::class,'index'])->name('listarEmpleados');
    Route::delete('/borrarEmpleado/{empleado}', [EmpleadoController::class,'destroy'])->name('borrarEmpleado');
    Route::post('/editarEmpleado/{empleado}', [EmpleadoController::class,'update'])->name('editarEmpleado');
});


require __DIR__.'/auth.php';
