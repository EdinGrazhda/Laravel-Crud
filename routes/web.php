<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;



Route::get('/categories',[CategoryController::class,'index'])->name('index');


Route::get('/categories/create',[CategoryController::class,'create'])->name('create');

Route::post('/categories/create',[CategoryController::class,'store'])->name('createinsert');

Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('edit');

Route::put('/categories/{id}/edit',[CategoryController::class,'update']);

Route::get('/categories/{id}/delete',[CategoryController::class,'destroy']);

Route::get('/',function(){
    return view('category.home');
})->name('home');













Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
