<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BeneficiadoController,
    UserController,
    CupomController,
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
    Route::get('/entrega', [UserController::class, 'index'])->name(('entrega.index'));
    Route::get('/compras', [UserController::class, 'index'])->name(('compras.index'));

    Route::get('/funcionarios', [UserController::class, 'lista'])->name('users.index');
    Route::delete('/funcionario/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/funcionarios/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('funcionario/{id}', [UserController::class, 'update'])->name('users.update');

    Route::get('/beneficiado/create', [BeneficiadoController::class, 'create'])->name('beneficiado.create');
    Route::post('/beneficiado/store', [BeneficiadoController::class, 'store'])->name('beneficiado.register');
    Route::get('/beneficiado/{id}', [BeneficiadoController::class, 'show'])->name('beneficiado.show');
    Route::get('/pesquisa', [BeneficiadoController::class, 'pesquisa'])->name('pesquisa');

    Route::get('/cupom/{id}/create', [CupomController::class, 'create'])->name('cupom.create');
    Route::post('/cupom/{id}/store', [CupomController::class, 'store'])->name('cupom.store');
    Route::delete('/cupom/{id}/{idBeneficiado}', [CupomController::class, 'delete'])->name('cupom.delete');
    Route::get('/cupom/{id}/deleteAll', [CupomController::class, 'deleteAll'])->name('cupom.deleteAll');
});


require __DIR__.'/auth.php';
