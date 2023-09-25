<?php

use App\Http\Controllers\Admin\ActingCommitmentMarkerController;
use App\Http\Controllers\Admin\CvConsultantController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\KindOfWorkController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\SiteSupervisorController;
use App\Http\Controllers\Admin\SupervisingConsultantController;
use App\Http\Controllers\Admin\TaskReportAdminController;
use App\Http\Controllers\Admin\TaskReportController;
use App\Http\Controllers\Admin\TimeScheduleController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Partner\DashboardPartnerController;
use App\Http\Controllers\SupervisingConsultant\DashboardSupervisingConsultantController;
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

Route::get('/', [AuthController::class, 'index']);
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.admin');

    Route::resource('cv-consultant', CvConsultantController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('supervising-consultant', SupervisingConsultantController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('partner', PartnerController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('site-supervisor', SiteSupervisorController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('acting-commitment-marker', ActingCommitmentMarkerController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);

    // task report
    // Route::resource('task-report', TaskReportController::class)->only(['index', 'store', 'destroy', 'update', 'edit', 'create', 'show']);

    Route::get('task-report', [TaskReportAdminController::class, 'index'])->name('task.report.admin');
    Route::get('task-report/{id}', [TaskReportAdminController::class, 'show'])->name('show.task.report.admin');
    Route::get('create-task-report', [TaskReportAdminController::class, 'create'])->name('create.task.report.admin');
    Route::post('store-task-report', [TaskReportAdminController::class, 'store'])->name('store.task.report.admin');
    Route::get('edit-task-report/{id}', [TaskReportAdminController::class, 'edit'])->name('edit.task.report.admin');
    Route::put('update-task-report/{id}', [TaskReportAdminController::class, 'update'])->name('update.task.report.admin');
    Route::delete('destroy-task-report/{id}', [TaskReportAdminController::class, 'destroy'])->name('destroy.task.report.admin');
});

// Route::resource('task-report', TaskReportController::class)->only(['index', 'store', 'destroy', 'update', 'edit', 'create', 'show']);

Route::resource('unit', UnitController::class)->only(['index', 'store', 'destroy']);

Route::prefix('task-report')->group(function () {
    Route::get('/kind-of-work/{taskId}', [KindOfWorkController::class, 'create'])->name('kind.of.work');
    Route::post('/kind-of-work', [KindOfWorkController::class, 'store'])->name('kind.of.work.store');
    Route::get('/kind-of-work/{id}/edit', [KindOfWorkController::class, 'edit'])->name('kind.of.work.edit');
    Route::put('/kind-of-work/{id}/update', [KindOfWorkController::class, 'update'])->name('kind.of.work.update');
});

Route::get('manage-work/{id}', [KindOfWorkController::class, 'manageWork'])->name('manage.work');
Route::put('update-manage-work/{id}', [KindOfWorkController::class, 'updateManageWork'])->name('manage.work.update');
Route::get('manage-work-progress/{id}', [KindOfWorkController::class, 'manageWorkProgress'])->name('manage.work.progress');
Route::put('update-progress/{id}', [KindOfWorkController::class, 'updateProgress'])->name('update.work.progress');
Route::post('upload-progress-picture', [KindOfWorkController::class, 'uploadProgressPicture'])->name('upload.progress.picture');

Route::get('create-time-schedule/{kindOfWorkDetailId}', [TimeScheduleController::class, 'create'])->name('create.time.schedule');
Route::put('update-time-schedule/{kindOfWorkDetailId}', [TimeScheduleController::class, 'update'])->name('update.time.schedule');


// additional url
Route::get('count-percentage/{id}', [KindOfWorkController::class, 'countPercentage']);

Route::prefix('konsultan-pengawas')->group(function () {
    Route::get('dashboard', [DashboardSupervisingConsultantController::class, 'index'])->name('supervising.consultant.dashboard');
});

Route::prefix('rekanan')->group(function () {
    Route::get('dashboard', [DashboardPartnerController::class, 'index'])->name('partner.dashboard');
});

Route::get('task-report', [TaskReportController::class, 'index'])->name('task.report');
Route::get('task-report/{id}', [TaskReportController::class, 'show'])->name('task.report.show');

Route::get('report/{id}', [TaskReportController::class, 'report'])->name('report');
Route::get('get-progress-picture/{id}', [KindOfWorkController::class, 'getProgressPictures'])->name('get.progress.picture');

// agreement
Route::post('agree/{scheduleID}', [AgreementController::class, 'agree'])->name('agree');
