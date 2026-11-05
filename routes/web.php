<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'active'])->group(function () {
    // Rota para o PDF (Deve vir antes do resource para não confundir com o ID)
    Route::get('/contacts/export/pdf', [ContactController::class, 'exportPdf'])->name('contacts.pdf');

    Route::resource('contacts', ContactController::class);
});
// Rotas para usuários autenticados e ativos
Route::middleware(['auth', 'active'])->group(function () {

    // Dashboard com estatísticas
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware('verified')
        ->name('dashboard');

    // Nossas rotas de contatos
    Route::resource('contacts', ContactController::class);

});


// Rotas exclusivas para administradores
Route::middleware(['auth', 'active', 'is_admin'])->group(function () {

    Route::get('/admin/users', [AdminController::class, 'index'])
        ->name('admin.users');

    Route::patch('/admin/users/{user}/toggle', [AdminController::class, 'toggleStatus'])
        ->name('admin.users.toggle');

});


// Página inicial
Route::get('/', function () {
    return view('welcome');
});


// Rotas de perfil
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});


// Rotas de autenticação
require __DIR__.'/auth.php';
