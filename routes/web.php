<?php

use App\Http\Controllers\Admin\ActingCommitmentMarkerController;
use App\Http\Controllers\Admin\CvConsultantController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SiteSupervisorController;
use App\Http\Controllers\Admin\SupervisingConsultantController;
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

Route::prefix('admin')->group(function () {
    Route::resource('dashboard', DashboardAdminController::class)->only(['index']);
    Route::resource('cv-consultant', CvConsultantController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('supervising-consultant', SupervisingConsultantController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('partner', PartnerController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('site-supervisor', SiteSupervisorController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('ppk', ActingCommitmentMarkerController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
});
