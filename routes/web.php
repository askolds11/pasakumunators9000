<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasakumsController;
use App\Http\Controllers\KomentarsController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\DashboardController;

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

Route::get('/dashboard', [DashboardController::class, 'index']
        )->middleware(['auth'])->name('dashboard');

// ROUTEES MŪSU LAPAI--------------------------------------------------------

// MAIN LAPA
Route::get('/mainpage', [MainPageController::class, 'index']);

// FILTER LAPA
Route::get('/filter', [PasakumsController::class, 'showFilter']);

// PASĀKUMA IZVEIDES LAPA
Route::resource('pasakums', PasakumsController::class, ['except' => ['create', 'index', 'store']]);
Route::get('pasakumi', [PasakumsController::class, 'index']);
Route::get('new_pasakums', [PasakumsController::class, 'create']
        )->middleware('role:pasakumu_veidotajs');
Route::post('new_pasakums', [PasakumsController::class, 'store']
        )->middleware('role:pasakumu_veidotajs');

//ADMIN PANEL
Route::get('adminpanel', [AdminPanelController::class, 'index']
        )->middleware('role:administrators');


require __DIR__.'/auth.php';
