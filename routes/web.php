<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\KindOfWorkController;
use App\Http\Controllers\Admin\CvConsultantController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\SiteSupervisorController;
use App\Http\Controllers\Admin\TaskReportAdminController;
use App\Http\Controllers\Partner\DashboardPartnerController;
use App\Http\Controllers\Partner\TaskReportPartnerController;
use App\Http\Controllers\Admin\SupervisingConsultantController;
use App\Http\Controllers\Admin\ActingCommitmentMarkerController;
use App\Http\Controllers\McHistoryController;
use App\Http\Controllers\SupervisingConsultant\DashboardSupervisingConsultantController;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;
use App\Http\Controllers\SupervisingConsultant\TimeScheduleSupervisingConsultantController;
use App\Http\Controllers\SupervisingConsultant\WeeklyReportSupervisingConsultantController;

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

// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.admin');

    Route::resource('cv-consultant', CvConsultantController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('supervising-consultant', SupervisingConsultantController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('partner', PartnerController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('site-supervisor', SiteSupervisorController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('acting-commitment-marker', ActingCommitmentMarkerController::class)->only(['index', 'store', 'destroy', 'update', 'edit']);
    Route::resource('unit', UnitController::class)->only(['index', 'store', 'destroy']);

    // task report
    Route::get('task-report', [TaskReportAdminController::class, 'index'])->name('task.report.admin');
    Route::get('task-report/{id}', [TaskReportAdminController::class, 'show'])->name('show.task.report.admin');
    Route::get('create-task-report', [TaskReportAdminController::class, 'create'])->name('create.task.report.admin');
    Route::post('store-task-report', [TaskReportAdminController::class, 'store'])->name('store.task.report.admin');
    Route::get('edit-task-report/{id}', [TaskReportAdminController::class, 'edit'])->name('edit.task.report.admin');
    Route::put('update-task-report/{id}', [TaskReportAdminController::class, 'update'])->name('update.task.report.admin');
    Route::delete('destroy-task-report/{id}', [TaskReportAdminController::class, 'destroy'])->name('destroy.task.report.admin');

    Route::get('manage-work/{id}', [KindOfWorkController::class, 'manageWork'])->name('manage.work.admin');

    Route::prefix('task-report')->group(function () {
        Route::get('/kind-of-work/{taskId}', [KindOfWorkController::class, 'create'])->name('kind.of.work');
        Route::post('/kind-of-work', [KindOfWorkController::class, 'store'])->name('kind.of.work.store');
        Route::get('/kind-of-work/{id}/edit', [KindOfWorkController::class, 'edit'])->name('kind.of.work.edit');
        Route::put('/kind-of-work/{id}/update', [KindOfWorkController::class, 'update'])->name('kind.of.work.update');
        Route::delete('/destroy-kind-of-work/{id}', [KindOfWorkController::class, 'destroyKindOfWork'])->name('kind.of.work.destroy');
    });
});


// Konsultan Pengawas
Route::prefix('konsultan-pengawas')->group(function () {
    Route::get('dashboard', [DashboardSupervisingConsultantController::class, 'index'])->name('supervising.consultant.dashboard');

    Route::get('task-report', [TaskReportSupervisingConsultantController::class, 'index'])->name('task.report.supervising.consultant');
    Route::get('task-report/{id}', [TaskReportSupervisingConsultantController::class, 'show'])->name('show.task.report.supervising.consultant');

    Route::get('create-time-schedule/{kindOfWorkDetailId}', [TimeScheduleSupervisingConsultantController::class, 'create'])->name('create.time.schedule');
    Route::put('update-time-schedule/{kindOfWorkDetailId}', [TimeScheduleSupervisingConsultantController::class, 'update'])->name('update.time.schedule');

    Route::put('update-manage-work/{id}', [KindOfWorkController::class, 'updateManageWork'])->name('manage.work.update');
    Route::get('manage-work-progress/{id}', [WeeklyReportSupervisingConsultantController::class, 'manageWeeklyProgress'])->name('manage.work.progress');
    Route::put('update-progress/{id}', [WeeklyReportSupervisingConsultantController::class, 'updateProgress'])->name('update.work.progress');
    Route::post('upload-progress-picture', [KindOfWorkController::class, 'uploadProgressPicture'])->name('upload.progress.picture');
    Route::delete('remove-progress-picture/{id}', [KindOfWorkController::class, 'removeProgressPictures'])->name('remove.progress.picture');
});

// Rekanan
Route::prefix('rekanan')->group(function () {
    Route::get('dashboard', [DashboardPartnerController::class, 'index'])->name('partner.dashboard');
    Route::get('task-report', [TaskReportPartnerController::class, 'index'])->name('task.report.partner');
    Route::get('task-report/{id}', [TaskReportPartnerController::class, 'show'])->name('show.task.report.partner');
});

// Agreement
Route::prefix('agreement')->group(function () {
    Route::get('get-task-this-week/{taskID}/{week}', [AgreementController::class, 'getTaskThisWeek']);
    // Route::get('reject/{taskID}/{week}/{status}/{reject}', [AgreementController::class, 'reject']);

    Route::post('reject-weekly-progress', [AgreementController::class, 'reject'])->name('reject.weekly.progress');

    Route::post('from-supervising-consultant', [AgreementController::class, 'fromSupervisingConsultant'])->name('agree.from.supervising.consultant');
});

// additional url
Route::get('count-percentage/{id}', [KindOfWorkController::class, 'countPercentage']);

Route::get('report/{id}', [TaskReportAdminController::class, 'report'])->name('report');

Route::get('get-progress-picture/{id}', [KindOfWorkController::class, 'getProgressPictures'])->name('get.progress.picture');


// history Mc
Route::get('history-mc/{taskID}/{totalMc}', [McHistoryController::class, 'history'])->name('mc.history');

// Count Total Progress Before This Week
Route::get('count-total-progress-before-this-week/{kindOfWorkDetailID}', [KindOfWorkController::class, 'countTotalProgressBeforeThisWeek']);
