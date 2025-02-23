<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BeneficiadoController,
    UserController,
};
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
    return view('auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('index');
    Route::get('/funcionarios', [UserController::class, 'lista'])->name('users.index');
    Route::delete('/funcionario/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/funcionarios/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('funcionario/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/beneficiado/create', [BeneficiadoController::class, 'create'])->name('beneficiado.create');
    Route::post('/beneficiado/store', [BeneficiadoController::class, 'store'])->name('beneficiado.register');
    Route::get('/beneficiado/{id}', [BeneficiadoController::class, 'show'])->name('beneficiado.show');
    Route::get('/pesquisa', [BeneficiadoController::class, 'pesquisa'])->name('pesquisa');
});


require __DIR__.'/auth.php';
