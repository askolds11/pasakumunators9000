<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasakumsController;
use App\Http\Controllers\KomentarsController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\MainPageController;

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
Route::get('/mainpage', [MainPageController::class, 'index']);

// FILTER LAPA
Route::get('/filter', [PasakumsController::class, 'showFilter']);

// PASĀKUMA IZVEIDES LAPA
Route::resource('pasakums', PasakumsController::class, ['except' => ['create']]);
Route::get('/new_pasakums', [PasakumsController::class, 'create']
<<<<<<< HEAD
)->middleware('role:invidivuals'); //currently only needs login

// ROUTE UZ INDIVIDUĀLU PASĀKUMU UN TĀ DATIEM (BŪS JĀMAINA, LAI TAS PARĀDA NOTEIKTU PASĀKUMU, NEVIS VNK BASIC LAPU)
Route::get('/pasakums/id', function () {
    return view('show_pasakums');
});

Route::get('app', function () {
    return view('app');
});

=======
)->middleware('role:grupaskapteinis,invidivuals'); //currently only needs login
>>>>>>> d3dc12be1ab65d494c62c820cc0400fdabca8201

//ADMIN PANEL
Route::get('adminpanel', [AdminPanelController::class, 'index'])->middleware('role:invidivuals');


require __DIR__.'/auth.php';
