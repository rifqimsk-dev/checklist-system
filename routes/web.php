<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormChecklistController;
use App\Http\Controllers\HasilChecklist;
use App\Http\Controllers\IsiChecklistController;
use App\Http\Controllers\UserChecklistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])
->middleware('role:admin,auditor')
->name('dashboard');

Route::resource('userchecklist', UserChecklistController::class)
->middleware('role:admin');

Route::resource('formchecklist', FormChecklistController::class)
->middleware('role:admin,auditor');

Route::resource('isichecklist', IsiChecklistController::class)
->middleware('role:admin,auditor');

Route::get('/hasilchecklist', [HasilChecklist::class, 'index'])
->middleware('role:admin,auditor')
->name('hasilchecklist.index');

Route::get('/hasilchecklist/view', [HasilChecklist::class, 'view'])
->middleware('role:admin,auditor')
->name('hasilchecklist.view');

Route::resource('akun', AkunController::class)
->middleware('role:admin');

// AUTHENTICATION
// ====================================================================
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ====================================================================

// Documentation
Route::get('/docs/form-step', function() {
    return view('docs.form-step', ['title' => 'Step']);
});