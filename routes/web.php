<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('blogs', BlogController::class);

// Route::get('/blogs/edit', function () {
//     return view('blogs.edit');
// });

// Route::get('/myblogs/show', function () {
//     return view('blogs.show');
// });