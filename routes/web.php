<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtigoController;
use App\Http\Controllers\SantoController;
use App\Http\Controllers\OracaoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update'); // <-- Corrigido aqui!
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Rotas Livres (Somente Leitura para Usuários comuns / Visitantes)
Route::get('/artigos', [ArtigoController::class, 'publicIndex'])->name('public.artigos');
Route::get('/santos', [SantoController::class, 'publicIndex'])->name('public.santos');
Route::get('/oracoes', [OracaoController::class, 'publicIndex'])->name('public.oracoes');

// Rotas Protegidas (Apenas quem está logado E possui role === 'admin')
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('artigos', ArtigoController::class);
    Route::resource('santos', SantoController::class);
    Route::resource('oracoes', OracaoController::class);
});

require __DIR__.'/auth.php';