<?php

use App\Http\Controllers\Admin\CvConsultantController;
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

Route::get('/', function () {
    return view('admin.dashboard.index');
});


Route::prefix('admin')->group(function () {
    Route::resource('cv-consultant', CvConsultantController::class)->only(['index', 'store', 'destroy', 'update']);
    Route::resource('supervising-consultant', SupervisingConsultantController::class)->only(['index', 'store', 'destroy', 'update']);
});
