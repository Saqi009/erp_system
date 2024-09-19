<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\employee\TodoController;
use App\Http\Controllers\employee\lead\LeadController;
use App\Http\Controllers\employee\profile\profileController;
use App\Http\Controllers\employee\dashboard\DashboardController;
use App\Http\Controllers\employee\attendance\AttendanceController;
use App\Http\Controllers\employee\attendance\AddAttendanceController;
use App\Http\Controllers\employee\attendance\AttendanceReportController;

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'login_view')->name('login');
    Route::post('/', 'login');
    Route::get('/login', 'logout')->name('logout');
});


Route::controller(DashboardController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
});

Route::controller(AttendanceController::class)->group(function () {
    Route::get('/attendance', 'attendance')->name('attendance');
});

Route::controller(TodoController::class)->group(function () {
    Route::get('/todo', 'index')->name('todo');
    Route::post('/todo', 'store');
    Route::get('/todo/{task}/edit', 'edit')->name('todo.edit');
    Route::patch('/todo/{task}/update', 'update')->name('todo.update');
    Route::delete('/todo/{task}/destroy', 'destroy')->name('todo.destroy');
});

Route::controller(profileController::class)->group(function () {
    Route::get('/profile', 'profile')->name('profile');
    Route::patch('/profile/details', 'details')->name('profile.details');
    Route::patch('/profile/password', 'password')->name('profile.password');
});

Route::controller(AddAttendanceController::class)->group(function(){
    Route::get('/addattendance', 'addattendance')->name('attendance');
    Route::post('/addattendance', 'store');
});

Route::controller(AttendanceReportController::class)->group(function(){
    Route::get('/attendancereport', 'attendancereport')->name('report');
});

Route::controller(AdminDashboard::class)->group(function() {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
    Route::get('/admin/attendance', 'attendance')->name('admin.attendance');
});

Route::controller(LeadController::class)->group(function() {
    Route::get('/employee/leads', 'index')->name('employee.leads');
    Route::get('employee/lead/create', 'create')->name('lead.create');
    Route::post('employee/lead/create', 'store');
    Route::get('employee/lead/{lead}/edit', 'edit')->name('lead.edit');
    Route::patch('employee/lead/{lead}/edit', 'update');
    Route::delete('employee/lead/{lead}/destroy', 'destroy')->name('lead.destroy');
});
