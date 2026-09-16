<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');
// URI parametro que eu passo apos url

Route::resource('categoria',categoriaController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});
// 1 nome da minha URI 
// 2 É o nome da view que eu quero renderizar

require __DIR__.'/settings.php';
