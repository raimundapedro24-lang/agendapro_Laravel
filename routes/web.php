<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController; // <--- ADICIONE ESTA LINHA
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::middleware(['auth', 'active'])->group(function (){
    // Rota padrão do Breeze
    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');

    // Nossas rotas de contatos
    Route::resource('contacts', ContactController::class);
});


Route::middleware(['auth', 'active', 'is_admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
    Route::patch('/admin/users/{user}/toggle', [AdminController::class, 'toggleStatus'])->name('admin.users.toggle');
});

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
});

// Antes estava apenas ['auth', 'verified']
Route::get('/dashboard', function (){
    return view('dashboard');
})->middleware(['auth', 'verified', 'active'])->name('dashboard');

require __DIR__.'/auth.php';
