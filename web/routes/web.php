<?php

use App\Http\Controllers\StudentController;
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
    return view('welcome');
});

Route::group(['prefix'=>'student','middleware'=>['student:student']],function(){
    Route::get('/login', [StudentController::class, 'loginForm']);
    Route::post('/login', [StudentController::class, 'store'])->name('student.login');
});

Route::middleware(['auth:sanctum,student', 'verified'])->get('/student/dashboard', function () {
    return view('dashboard');
})->name('student.dashboard');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
