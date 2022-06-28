<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasakumsController;
use App\Http\Controllers\KomentarsController;
use App\Http\Controllers\AdminPanelController;

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
Route::get('/filter', [PasakumsController::class, 'showFilter']);

// PASĀKUMA IZVEIDES LAPA
Route::resource('pasakums', PasakumsController::class, ['except' => ['create']]);
Route::get('/new_pasakums', [PasakumsController::class, 'create']
)->middleware('role:grupaskapteinis,invidivuals'); //currently only needs login

//ADMIN PANEL
Route::get('adminpanel', [AdminPanelController::class, 'index'])->middleware('role:invidivuals');


require __DIR__.'/auth.php';
