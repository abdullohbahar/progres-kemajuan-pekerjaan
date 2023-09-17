<?php

use App\Http\Controllers\Admin\ActingCommitmentMarkerController;
use App\Http\Controllers\Admin\CvConsultantController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KindOfWorkController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SiteSupervisorController;
use App\Http\Controllers\Admin\SupervisingConsultantController;
use App\Http\Controllers\Admin\TaskReportController;
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

    Route::resource('acting-commitment-marker', ActingCommitmentMarkerController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);

    Route::resource('task-report', TaskReportController::class)->only(['index', 'store', 'destroy', 'update', 'edit', 'create', 'show']);

    Route::prefix('task-report')->group(function () {
        Route::get('/kind-of-work/{taskId}', [KindOfWorkController::class, 'create'])->name('kind.of.work');
        Route::post('/kind-of-work', [KindOfWorkController::class, 'store'])->name('kind.of.work.store');
        Route::get('/kind-of-work/{id}/edit', [KindOfWorkController::class, 'edit'])->name('kind.of.work.edit');
        Route::put('/kind-of-work/{id}/update', [KindOfWorkController::class, 'update'])->name('kind.of.work.update');
    });

    Route::get('manage-work/{id}', [KindOfWorkController::class, 'manageWork'])->name('manage.work');
    Route::put('update-manage-work/{id}', [KindOfWorkController::class, 'updateManageWork'])->name('manage.work.update');
});
