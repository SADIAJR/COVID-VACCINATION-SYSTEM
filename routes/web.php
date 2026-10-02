<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\PatientAuthController;
use App\Http\Controllers\Auth\HospitalAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\PatientDashboardController;
use App\Http\Controllers\HospitalDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\VaccineController;
use App\Http\Controllers\Hospital\VaccineController as HospitalVaccineController;
use App\Http\Controllers\PatientAppointmentController;
use App\Http\Controllers\HospitalAppointmentController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ReportController;

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ReviewController;

// Language switcher
Route::get('/lang/{lang}', [LanguageController::class, 'switch'])->name('lang.switch');

// Review (patient submits before logout)
Route::post('/review', [ReviewController::class, 'store'])->name('review.store')->middleware('auth');

// Public pages
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/hospitals', [PageController::class, 'hospitals'])->name('hospitals');
Route::get('/vaccines', [PageController::class, 'vaccines'])->name('vaccines');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::post('/contact', [PageController::class, 'sendContact'])->name('contact.send');
Route::get('/support/{section?}', [PageController::class, 'support'])->name('support');

// Patient registration
Route::get('/register/patient', [PatientAuthController::class, 'showForm'])->name('patient.register');
Route::post('/register/patient', [PatientAuthController::class, 'register']);

// Hospital registration
Route::get('/register/hospital', [HospitalAuthController::class, 'showForm'])->name('hospital.register');
Route::post('/register/hospital', [HospitalAuthController::class, 'register']);

// Shared login (all roles)
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->withoutMiddleware(['throttle']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Forgot Password (PIN based)
Route::get('/forgot-password',           [ForgotPasswordController::class, 'showForgotForm'])  ->name('password.forgot.form');
Route::post('/forgot-password',          [ForgotPasswordController::class, 'sendPin'])         ->name('password.send-pin');
Route::get('/verify-pin',                [ForgotPasswordController::class, 'showVerifyPinForm'])->name('password.verify-pin.form');
Route::post('/verify-pin',               [ForgotPasswordController::class, 'verifyPin'])        ->name('password.verify-pin');
Route::get('/reset-password',            [ForgotPasswordController::class, 'showResetForm'])    ->name('password.reset.form');
Route::post('/reset-password',           [ForgotPasswordController::class, 'resetPassword'])    ->name('password.reset');

// Protected dashboards
Route::middleware(['auth', 'role:patient'])->get('/patient/dashboard', [PatientDashboardController::class, 'index'])->name('patient.dashboard');
Route::middleware(['auth', 'role:patient'])->get('/patient/profile/edit',    [PatientDashboardController::class, 'edit'])->name('patient.profile.edit');
Route::middleware(['auth', 'role:patient'])->put('/patient/profile/update',  [PatientDashboardController::class, 'update'])->name('patient.profile.update');
Route::middleware(['auth', 'role:patient'])->delete('/patient/profile',      [PatientDashboardController::class, 'destroy'])->name('patient.profile.delete');

Route::middleware(['auth', 'role:hospital'])->get('/hospital/dashboard', [HospitalDashboardController::class, 'index'])->name('hospital.dashboard');
Route::middleware(['auth', 'role:hospital'])->get('/hospital/profile/edit',   [HospitalDashboardController::class, 'edit'])  ->name('hospital.profile.edit');
Route::middleware(['auth', 'role:hospital'])->put('/hospital/profile/update', [HospitalDashboardController::class, 'update'])->name('hospital.profile.update');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard',                                    [AdminDashboardController::class, 'index'])           ->name('admin.dashboard');
    Route::get('/admin/hospitals',                                    [AdminDashboardController::class, 'hospitals'])        ->name('admin.hospitals');
    Route::post('/admin/hospitals/{hospitalProfile}/approve',         [AdminDashboardController::class, 'approveHospital']) ->name('admin.approve-hospital');
    Route::post('/admin/hospitals/{hospitalProfile}/reject',          [AdminDashboardController::class, 'rejectHospital'])  ->name('admin.reject-hospital');
});

// Patient appointment routes
Route::middleware(['auth', 'role:patient'])->group(function () {
    Route::get('/patient/search-hospitals',              [PatientAppointmentController::class, 'searchHospitals'])  ->name('patient.search-hospitals');
    Route::post('/patient/book-appointment',             [PatientAppointmentController::class, 'bookAppointment'])  ->name('patient.book-appointment');
    Route::get('/patient/appointments',                  [PatientAppointmentController::class, 'myAppointments'])   ->name('patient.appointments.index');
    Route::get('/patient/appointments/{id}/result',      [PatientAppointmentController::class, 'viewResult'])         ->name('patient.result');
    Route::get('/patient/appointments/{id}/vaccine-card', [PatientAppointmentController::class, 'vaccineCard'])        ->name('patient.vaccine-card');
    Route::get('/patient/tracking',                      [PatientAppointmentController::class, 'tracking'])           ->name('patient.tracking');
});

// Hospital appointment routes
Route::middleware(['auth', 'role:hospital'])->group(function () {
    Route::get('/hospital/appointments',                                        [HospitalAppointmentController::class, 'index'])                ->name('hospital.appointments.index');
    Route::get('/hospital/patients',                                            [HospitalAppointmentController::class, 'patients'])             ->name('hospital.patients');
    Route::post('/hospital/appointments/{appointment}/accept',                  [HospitalAppointmentController::class, 'accept'])               ->name('hospital.appointments.accept');
    Route::post('/hospital/appointments/{appointment}/reject',                  [HospitalAppointmentController::class, 'reject'])               ->name('hospital.appointments.reject');
    Route::post('/hospital/appointments/{appointment}/test-result',             [HospitalAppointmentController::class, 'updateTestResult'])     ->name('hospital.appointments.test-result');
    Route::post('/hospital/appointments/{appointment}/vaccination-status',      [HospitalAppointmentController::class, 'updateVaccinationStatus'])->name('hospital.appointments.vaccination-status');
    Route::resource('hospital/vaccines', HospitalVaccineController::class)->names('hospital.vaccines');
});
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('vaccines', VaccineController::class);
    Route::get('patients', [PatientController::class, 'index'])->name('patients.index');
    Route::get('reports/test-reports',        [ReportController::class, 'testReports'])       ->name('reports.test-reports');
    Route::get('reports/test-reports/export', [ReportController::class, 'exportTestReports']) ->name('reports.test-reports.export');
    Route::get('reports/bookings',            [ReportController::class, 'bookings'])           ->name('reports.bookings');
});