<?php

use App\Http\Controllers\ActingCommitmentMarker\DashboardActingCommitmentMarkerController;
use App\Http\Controllers\ActingCommitmentMarker\TaskReportActingComitmentMarkerController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgreementController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\McHistoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\KindOfWorkController;
use App\Http\Controllers\Admin\CvConsultantController;
use App\Http\Controllers\TaskReportAgreementController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\SiteSupervisorController;
use App\Http\Controllers\Admin\TaskReportAdminController;
use App\Http\Controllers\Partner\DashboardPartnerController;
use App\Http\Controllers\Partner\TaskReportPartnerController;
use App\Http\Controllers\Admin\SupervisingConsultantController;
use App\Http\Controllers\Admin\ActingCommitmentMarkerController;
use App\Http\Controllers\Admin\DivisionMasterDataController;
use App\Http\Controllers\Admin\TaskMasterDataController;
use App\Http\Controllers\ExportPDFController;
use App\Http\Controllers\GetTaskByDivisionController;
use App\Http\Controllers\GetTaskUnitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiteSupervisor\DashboardSiteSupervisorController;
use App\Http\Controllers\SiteSupervisor\TaskReportSiteSupervisorController;
use App\Http\Controllers\SupervisingConsultant\DashboardSupervisingConsultantController;
use App\Http\Controllers\SupervisingConsultant\TaskReportSupervisingConsultantController;
use App\Http\Controllers\SupervisingConsultant\TimeScheduleSupervisingConsultantController;
use App\Http\Controllers\SupervisingConsultant\WeeklyReportSupervisingConsultantController;
use App\Http\Controllers\SuratSpController;
use App\Http\Controllers\TerminateContractController;

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

Route::get('/', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// ADMIN
Route::prefix('admin')->middleware('admin')->group(function () {
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

        Route::post('send-task-report-agreement', [TaskReportAgreementController::class, 'sendTaskReportAgreement'])->name('send.task.report.agreement');
    });

    Route::put('update-manage-work/{id}', [KindOfWorkController::class, 'updateManageWork'])->name('manage.work.update.admin');

    Route::prefix('division')->group(function () {
        Route::get('/', [DivisionMasterDataController::class, 'index'])->name('admin.division');
        Route::post('store', [DivisionMasterDataController::class, 'store'])->name('admin.division.store');
        Route::delete('destroy/{id}', [DivisionMasterDataController::class, 'destroy'])->name('admin.division.destroy');
    });

    Route::prefix('task')->group(function () {
        Route::get('/', [TaskMasterDataController::class, 'index'])->name('admin.task');
        Route::post('store', [TaskMasterDataController::class, 'store'])->name('admin.task.store');
        Route::delete('destroy/{id}', [TaskMasterDataController::class, 'destroy'])->name('admin.task.destroy');
    });
});


// Konsultan Pengawas
Route::prefix('konsultan-pengawas')->middleware('supervising-consultant')->group(function () {
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
Route::prefix('rekanan')->middleware('partner')->group(function () {
    Route::get('dashboard', [DashboardPartnerController::class, 'index'])->name('partner.dashboard');
    Route::get('task-report', [TaskReportPartnerController::class, 'index'])->name('task.report.partner');
    Route::get('task-report/{id}', [TaskReportPartnerController::class, 'show'])->name('show.task.report.partner');
});

Route::prefix('pengawas-lapangan')->middleware('site-supervisor')->group(function () {
    Route::get('dashboard', [DashboardSiteSupervisorController::class, 'index'])->name('site.supervisor.dashboard');
    Route::get('task-report', [TaskReportSiteSupervisorController::class, 'index'])->name('task.report.site.supervisor');
    Route::get('task-report/{id}', [TaskReportSiteSupervisorController::class, 'show'])->name('show.task.report.site.supervisor');
});

Route::prefix('ppk')->middleware('acting-commitment-marker')->group(function () {
    Route::get('dashboard', [DashboardActingCommitmentMarkerController::class, 'index'])->name('acting.commitment.marker.dashboard');
    Route::get('task-report', [TaskReportActingComitmentMarkerController::class, 'index'])->name('task.report.acting.commitment.marker');
    Route::get('task-report/{id}', [TaskReportActingComitmentMarkerController::class, 'show'])->name('show.task.report.acting.commitment.marker');
});

// Agreement
Route::prefix('agreement')->group(function () {
    Route::get('get-task-this-week/{taskID}/{week}', [AgreementController::class, 'getTaskThisWeek']);
    // Route::get('reject/{taskID}/{week}/{status}/{reject}', [AgreementController::class, 'reject']);

    Route::post('reject-weekly-progress', [AgreementController::class, 'reject'])->name('reject.weekly.progress');
    Route::get('reject-weekly-progress-reason/{taskReportID}', [AgreementController::class, 'rejectWeeklyProgressReason']);

    Route::post('from-supervising-consultant', [AgreementController::class, 'fromSupervisingConsultant'])->name('agree.from.supervising.consultant');
    Route::post('from-partner', [AgreementController::class, 'fromPartner'])->name('agree.from.partner');
    Route::post('from-site-supervisor', [AgreementController::class, 'fromSiteSupervisor1'])->name('agree.from.site.supervisor');
});

Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('update-profile/{id}', [ProfileController::class, 'update'])->name('update.profile');

// additional url
Route::get('count-percentage/{id}', [KindOfWorkController::class, 'countPercentage']);

Route::get('report/{id}', [TaskReportAdminController::class, 'report'])->name('report');
Route::post('export-report', [ExportPDFController::class, 'exportAllReport'])->name('export.pdf.all.report');


Route::get('weekly-report/{id}/{week}', [TaskReportAdminController::class, 'reportWeekly'])->name('weekly.report');

Route::get('get-progress-picture/{id}', [KindOfWorkController::class, 'getProgressPictures'])->name('get.progress.picture');
Route::get('get-progress-picture-other-role/{kindOfWorkDetailID}/{week}', [KindOfWorkController::class, 'getProgressPicturesOtherRole'])->name('get.progress.picture');


// history Mc
Route::get('history-mc/{taskID}/{totalMc}', [McHistoryController::class, 'history'])->name('mc.history');

// Count Total Progress Before This Week
Route::get('count-total-progress-before-this-week/{kindOfWorkDetailID}', [KindOfWorkController::class, 'countTotalProgressBeforeThisWeek']);

Route::get('list-task-report/{taskReportID}', [TaskReportAgreementController::class, 'listTaskReport'])->name('list.task.report');
Route::put('agree-task-report-agreement/{taskReportID}/{userID}/{role}/{agree}', [TaskReportAgreementController::class, 'agreeTaskReportAgreement'])->name('agree.task.report.agreement');
Route::put('reject-task-report-agreement', [TaskReportAgreementController::class, 'rejectTaskReportAgreement'])->name('reject.task.report.agreement');
Route::get('reject-reason/{taskReportID}', [TaskReportAgreementController::class, 'rejectReason']);

Route::post('terminate-contract/{taskReportID}', TerminateContractController::class);

Route::get('surat-sp/{id}', [SuratSpController::class, 'index'])->name('surat.sp');

Route::get('get-task-by-division/{divisionID}', GetTaskByDivisionController::class);

// Route::get('save', function () {
//     $users = array(
//         array('id' => '9a338d9f-dd43-4bff-a6e6-09112e45d054', 'username' => 'admin', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'role' => 'Admin', 'remember_token' => NULL, 'created_at' => '2023-09-23 09:41:40', 'updated_at' => '2023-09-23 09:41:40'),
//         array('id' => '9a338d9f-df3a-44bf-9599-1ec435d76e16', 'username' => 'konsultan-pengawas', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'role' => 'Supervising Consultant', 'remember_token' => NULL, 'created_at' => '2023-09-23 09:41:40', 'updated_at' => '2023-09-23 09:41:40'),
//         array('id' => '9a338d9f-e130-462f-ac6c-8c5d0692bf94', 'username' => 'rekanan', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'role' => 'Partner', 'remember_token' => NULL, 'created_at' => '2023-09-23 09:41:40', 'updated_at' => '2023-09-23 09:41:40'),
//         array('id' => '9a338d9f-e2fe-4750-af51-adbe2f723134', 'username' => 'pengawas-lapangan', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'role' => 'Site Supervisor', 'remember_token' => NULL, 'created_at' => '2023-09-23 09:41:40', 'updated_at' => '2023-09-23 09:41:40'),
//         array('id' => '9a338d9f-e476-4db5-8245-d98d77172007', 'username' => 'ppk', 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'role' => 'Acting Commitment Marker', 'remember_token' => NULL, 'created_at' => '2023-09-23 09:41:40', 'updated_at' => '2023-09-23 09:41:40')
//     );

//     foreach ($users as $userData) {
//         User::insert($userData);
//     }
// });


// Route::get('testing', function () {

//     $nilaiYangInginDihitung = 0.5;
//     $totalNilai = 14.55;

//     $persentase = ($nilaiYangInginDihitung / $totalNilai) * 100;

//     echo "0.5 adalah sekitar " . number_format($persentase, 2) . "% dari 14.55";
// });
