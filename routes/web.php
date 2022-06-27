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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/test', function () {
    return 'Test page22!';
});

Route::get('/testthing', function () {
    return 'Testthing!';
});
Route::get('/testing', function () {
    return 'Testing!';
});

// ROUTEES MŪSU LAPAI'

// MAIN LAPA
Route::get('/mainpage', function () {
    return view('mainpage');
});

// FILTER LAPA
Route::get('/filter', function () {
    return view('filter');
});

require __DIR__.'/auth.php';
