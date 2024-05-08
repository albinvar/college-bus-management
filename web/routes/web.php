<?php

use App\Http\Controllers\AccessLogController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\GuardianController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StaffController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        // TODO: show system status if in validation mode or assigner mode.

        return view('dashboard');
    })->name('dashboard');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/buses', [BusController::class, 'index',])->name('admin.manage-bus');

    Route::get('/parent/monitor/{student}', [GuardianController::class, 'show',])->name('parent.monitor-child');
    Route::get('/staff/{bus}/manual-checkin', [StaffController::class, 'index',])->name('staff.manual-checkin');

    Route::get('/assigner-mode', [BusController::class, 'assignerMode',])->name('admin.assigner-mode');

    Route::get('/semesters', [SemesterController::class, 'showSemesters'])->name('student.semesters');

    Route::get('/access-logs/{bus}', [AccessLogController::class, 'busShow',])->name('admin.manage-bus.access-logs');

    Route::get('/buses/{bus}/students', [StudentController::class, 'busStudentsShow',])->name('admin.manage-bus.students');

    // Staff assigned bus access logs
    Route::get('/buses/{bus}/staff-monitor', [AccessLogController::class, 'staffShow',])->name('staff.manage-bus.access-logs');


    // Generate fees for the student semester
    Route::post('/fees/{studentSemester}', [FeeController::class, 'generateFees',])->name('admin.generate-fees');

    // Payment gateway Routes
    Route::get('/pay/{fee}', [FeeController::class, 'showPaymentForm',])->name('pay');
    Route::post('/payment/gateway', [FeeController::class, 'handleGatewayResponse'])->name('payment.gateway.response');

});
