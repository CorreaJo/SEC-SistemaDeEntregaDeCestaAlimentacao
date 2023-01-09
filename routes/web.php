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

    Route::get('/beneficiado/create', [BeneficiadoController::class, 'create'])->name('beneficiado.create');
});


require __DIR__.'/auth.php';
