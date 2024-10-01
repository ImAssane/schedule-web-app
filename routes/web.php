<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\MedicalConsultController;
use App\Http\Controllers\WelcomeMedicalController;
use App\Http\Controllers\WelcomeStudentController;
use App\Http\Controllers\MedicalApprovalController;
use App\Http\Controllers\MedicalRegisterController;
use App\Http\Controllers\PatientAnalyticController;
use App\Http\Controllers\StudentRegisterController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\MedicalResetPasswordController;
use App\Http\Controllers\PatientResetPasswordController;
use App\Http\Controllers\MedicalAuthenticationController;
use App\Http\Controllers\StudentAuthenticationController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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




//Consultations
Route::get('/examinations', [ExaminationController::class, 'index'])->name('examination.index');
Route::get('/examinations/create', [ExaminationController::class, 'create'])->name('examination.create');
Route::post('/examinations', [ExaminationController::class, 'store'])->name('examination.store');
Route::get('/examinations/edit', [ExaminationController::class, 'edit'])->name('examination.edit');
//===========================================================================================================

Route::delete('logout', [AuthenticationController::class, 'destroy'])->name('logout');



//* -- student Authentication
Route::get('student/login', [StudentAuthenticationController::class, 'create'])->name('student.login.create');
Route::post('student/login', [StudentAuthenticationController::class, 'store'])->name('student.login.store');

Route::get('student/register', [StudentRegisterController::class, 'create'])->name('student.register.create');
Route::post('student/register', [StudentRegisterController::class, 'store'])->name('student.register.store');

Route::get('certification/register', [DashboardController::class, 'create'])->name('certifications.create');
Route::post('certification/register', [DashboardController::class, 'store'])->name('certifications.store');
Route::get('certifications/{cert}/edit', [DashboardController::class, 'edit'])->name('certifications.edit');
Route::put('certification/{cert}', [DashboardController::class, 'update'])->name('certifications.update');
Route::delete('certification/{certification}', [DashboardController::class, 'destroy'])->name('certifications.destroy');

Route::get('exam/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::get('/', [WelcomeStudentController::class, 'index'])->name('welcome.index');


Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('reports/create', [ReportController::class, 'create'])->name('reports.create');


//* -- Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
/* }); */

Route::get('/img/{path}', [ImagesController::class, 'show'])
    ->where('path', '.*')
    ->name('image');


