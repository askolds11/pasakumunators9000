<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/mainpage');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ROUTEES MŪSU LAPAI--------------------------------------------------------

// MAIN LAPA
Route::get('/mainpage', function () {
    return view('mainpage');
});

// FILTER LAPA
Route::get('/filter', function () {
    return view('filter');
});

// PASĀKUMA IZVEIDES LAPA
Route::get('/new_pasakums', function () {
    return view('new_pasakums');
});

// LIETOTĀJA REĢISTRĀCIJAS LAPA (BŪS JĀMAINA)
Route::get('/register_user', function () {
    return view('register_user');
});


require __DIR__.'/auth.php';
