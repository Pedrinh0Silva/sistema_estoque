<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aqui é onde você registra as rotas da sua aplicação.
|
*/

// Redireciona a página inicial para o login (opcional, mas prático)
Route::get('/', function () {
    return view('welcome');
});

// Rota do Dashboard após o login
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Todas as rotas protegidas por LOGIN ficam aqui dentro
Route::middleware('auth')->group(function () {
    
    // Rotas de Perfil (Geradas pelo Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // --- SISTEMA DE ESTOQUE ---
    // Esta única linha cria todas as rotas (Listar, Criar, Salvar, Editar, Excluir)
    Route::resource('produtos', ProdutoController::class);
});

require __DIR__.'/auth.php';