<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\AuthAdmin;
use App\Http\Controllers\KabKotaController;
use App\Http\Controllers\KajianController;
use App\Http\Controllers\KriteriaAdmin;
use App\Http\Controllers\LampiranFotoController;
use App\Http\Controllers\LampiranVideoController;
use App\Http\Controllers\PengelolaanController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\ProvinsiController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\SkoringController;
use App\Http\Controllers\SubstansiController;
use App\Http\Controllers\UserAdmin;
use App\Models\LampiranVideo;
use App\Models\Provinsi;
use App\Models\Ranking;
use App\Models\Substansi;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [AuthAdmin::class, 'index']);
Route::get('login', [AuthAdmin::class, 'viewLogin']);
Route::POST('auth', [AuthAdmin::class, 'authenticate']);
Route::get('register', [AuthAdmin::class, 'viewRegister']);
Route::POST('register', [AuthAdmin::class, 'register']);
Route::get('logout', [AuthAdmin::class, 'logout']);

Route::get('/admin/home', function () {
    return view('admin/home_admin');
})->middleware('auth');

Route::resource('/admin/user', UserAdmin::class)->middleware('auth');
Route::POST('/admin/user/activate', [UserAdmin::class, 'activate'])->middleware('auth');
Route::POST('/admin/user/deactivate', [UserAdmin::class, 'deactivate'])->middleware('auth');
Route::get('/admin/changePasswordView', [UserAdmin::class, 'changePasswordView'])->middleware('auth');
Route::post('/admin/changePassword', [UserAdmin::class, 'changePassword'])->middleware('auth');

Route::resource('/admin/provinsi', ProvinsiController::class)->middleware('auth');
Route::resource('/admin/kab_kota', KabKotaController::class)->middleware('auth');
Route::resource('/admin/kriteria', KriteriaAdmin::class)->middleware('auth');
Route::POST('/admin/ubahBobotKriteria', [KriteriaAdmin::class, 'ubahBobot'])->middleware('auth');
Route::resource('/admin/alternatif', AlternatifController::class)->middleware('auth');
Route::get('/admin/alternatifCreate', [AlternatifController::class, 'create'])->middleware('auth');
Route::post('/admin/alternatifStore', [AlternatifController::class, 'store'])->middleware('auth');
Route::resource('/admin/alternatifPerson', PersonController::class)->middleware('auth');
Route::resource('/admin/alternatifFoto', LampiranFotoController::class)->middleware('auth');
Route::resource('/admin/alternatifVideo', LampiranVideoController::class)->middleware('auth');
Route::resource('/admin/kajian', KajianController::class)->middleware('auth');
Route::resource('/admin/pengelolaan', PengelolaanController::class)->middleware('auth');
Route::resource('/admin/substansi', SubstansiController::class)->middleware('auth');
Route::post('/admin/alternatif_substansi', [AlternatifController::class, 'updateSubstansi'])->middleware('auth');
Route::resource('/admin/skoring', SkoringController::class)->middleware('auth');
Route::get('/admin/updateSkoring', [SkoringController::class, 'skoring'])->middleware('auth');
Route::resource('/admin/ranking', RankingController::class)->middleware('auth');
Route::get('/admin/downloadPDF', [RankingController::class, 'downloadPDF'])->middleware('auth');
