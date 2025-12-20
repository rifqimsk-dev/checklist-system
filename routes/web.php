<?php

use Mews\Captcha\Facades\Captcha;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HasilChecklist;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\IsiChecklistController;
use App\Http\Controllers\FormChecklistController;
use App\Http\Controllers\SummaryController;
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
->middleware('role:auditor');

Route::resource('isichecklist', IsiChecklistController::class)
->middleware('role:auditor');

Route::get('/hasilchecklist', [HasilChecklist::class, 'index'])
->middleware('role:admin,auditor')
->name('hasilchecklist.index');

Route::get('/hasilchecklist/view', [HasilChecklist::class, 'view'])
->middleware('role:admin,auditor')
->name('hasilchecklist.view');


// SUMMARY
// =================================================================
Route::get('/summary', [SummaryController::class, 'index'])
->middleware('role:admin,auditor')
->name('summary.index');

Route::get('/summary/view', [SummaryController::class, 'view'])
->middleware('role:admin,auditor')
->name('summary.view');

Route::post('/summary/store', [SummaryController::class, 'store'])
->middleware('role:admin,auditor')
->name('summary.store');

Route::get('/summary/{user_checklist_id}/{dealer_id}/{bulan}', [SummaryController::class, 'edit'])
->middleware('role:admin,auditor')
->name('summary.edit');

Route::put('/summary/{user_checklist_id}/{dealer_id}/{bulan}', [SummaryController::class, 'update'])
->middleware('role:admin,auditor')
->name('summary.update');
// =================================================================


Route::resource('akun', AkunController::class)
->middleware('role:admin');

Route::resource('dealer', DealerController::class)
->middleware('role:admin');

Route::resource('departemen', DepartemenController::class)
->middleware('role:admin');

Route::get('/profil/password', [ProfilController::class, 'form_password'])
->middleware('role:admin,auditor')
->name('profil.password');

Route::put('/profil/update', [ProfilController::class, 'update'])
->middleware('role:admin,auditor')
->name('profil.password.update');

// AUTHENTICATION
// ====================================================================
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// ====================================================================

// ---------- CAPTCHA ----------
Route::get('/reload-captcha', function () {
    return response()->json([
        'captcha' => Captcha::img()
    ]);
});

// Documentation
Route::get('/docs/form-step', function() {
    return view('docs.form-step', ['title' => 'Step']);
});