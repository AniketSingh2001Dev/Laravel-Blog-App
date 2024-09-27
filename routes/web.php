<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('blogs', BlogController::class);
Route::post('images/create', [ImageController::class, 'create'])->name('images.create');

// Route::get('/blogs/edit', function () {
//     return view('blogs.edit');
// });

// Route::get('/myblogs/show', function () {
//     return view('blogs.show');
// });