<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasakumsController;
use App\Http\Controllers\KomentarsController;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LietotajsPasakumsController;
use App\Http\Controllers\AttelsController;

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
Route::post('/filter', [PasakumsController::class, 'filter']);

// PASĀKUMA IZVEIDES LAPA
Route::resource('pasakums', PasakumsController::class, ['except' => ['create', 'index', 'store', 'edit', 'update', 'destroy']]);
Route::get('pasakumi', [PasakumsController::class, 'index']);
Route::get('new_pasakums', [PasakumsController::class, 'create']
        )->middleware(['auth', 'role:pasakumu_veidotajs']);
Route::post('new_pasakums', [PasakumsController::class, 'store']
        )->middleware(['auth', 'role:pasakumu_veidotajs']);

Route::get('pasakums/{pasakums}/edit', [PasakumsController::class, 'edit']
        )->middleware(['auth', 'role:pasakumu_veidotajs']);
Route::put('pasakums/{pasakums}', [PasakumsController::class, 'update']
        )->middleware(['auth', 'role:pasakumu_veidotajs']);
Route::patch('pasakums/{pasakums}', [PasakumsController::class, 'update']
        )->middleware(['auth', 'role:pasakumu_veidotajs']);

Route::delete('pasakums/{pasakums}', [PasakumsController::class, 'destroy']
        )->middleware(['auth', 'role:pasakumu_veidotajs']);

Route::post('pasakums/novertet', [PasakumsController::class, 'novertet']
        )->middleware(['auth']);

//ADMIN PANEL
Route::get('adminpanel', [AdminPanelController::class, 'index']
        )->middleware(['auth', 'role:administrators']);
Route::post('adminpanel/updaterole', [AdminPanelController::class, 'updateRole']
        )->middleware(['auth', 'role:administrators']);
Route::post('adminpanel/banuser', [AdminPanelController::class, 'banUser']
        )->middleware(['auth', 'role:administrators']);
Route::post('adminpanel/approvepasakums', [AdminPanelController::class, 'approvePasakums']
        )->middleware(['auth', 'role:administrators']);
Route::post('adminpanel/approvekomentars', [AdminPanelController::class, 'approveKomentars']
        )->middleware(['auth', 'role:administrators']);

Route::post('pasakums/post', [KomentarsController::class, 'store'])->middleware(['auth']);
Route::get('pasakums/{id}/pieteikties', [LietotajsPasakumsController::class, 'store'])->middleware(['auth']);
Route::post('pasakums/add_image', [AttelsController::class, 'store'])->middleware(['auth']);


Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});
require __DIR__.'/auth.php';
