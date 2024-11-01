<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReminderController;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\admin\AdminDashboard;
use App\Http\Controllers\employee\TodoController;
use App\Http\Controllers\admin\EmployeeController;
use App\Http\Controllers\employee\ContactController;
use App\Http\Controllers\admin\RegistrationController;
use App\Http\Controllers\employee\lead\LeadController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\admin\profile\ProfileController;
use App\Http\Controllers\employee\gallery\FileController;
use App\Http\Controllers\employee\gallery\ImageController;
use App\Http\Controllers\employee\gallery\VideoController;
use App\Http\Controllers\employee\dashboard\DashboardController;
use App\Http\Controllers\employee\attendance\AddAttendanceController;
use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\EmployeeGalleryController;
use App\Http\Controllers\admin\gallery\DocumentController as GalleryDocumentController;
use App\Http\Controllers\admin\gallery\ImageController as GalleryImageController;
use App\Http\Controllers\admin\gallery\VideoController as GalleryVideoController;
use App\Http\Controllers\admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\employee\gallery\DocumentController;
use App\Http\Controllers\employee\ProfileController as EmployeeProfileController;

Route::controller(AuthController::class)->group(function () {
    Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/', 'login_view')->name('login');
        Route::post('/', 'login');
    });
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegistrationController::class)->group(function () {
    Route::get('/admin/register', 'index')->name('admin.register');
    Route::post('/admin/register', 'register');
});

Route::middleware(Authenticate::class)->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(TodoController::class)->group(function () {
        Route::get('/todo', 'index')->name('todo');
        Route::post('/todo', 'store');
        Route::get('/todo/{task}/edit', 'edit')->name('todo.edit');
        Route::patch('/todo/{task}/update', 'update')->name('todo.update');
        Route::delete('/todo/{task}/destroy', 'destroy')->name('todo.destroy');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'profile')->name('profile');
        Route::patch('/profile/details', 'details')->name('profile.details');
        Route::patch('/profile/password', 'password')->name('profile.password');
    });

    Route::controller(AddAttendanceController::class)->group(function () {
        Route::get('/addattendance', 'addattendance')->name('attendance');
        Route::post('/addattendance/mark', 'mark')->name('employee.attendance.mark');
        Route::post('/addattendance/leave', 'leave')->name('employee.attendance.leave');
        Route::get('/addattendance/yourattendance', 'yourattendance')->name('addattendance.yourattendance');
    });

    Route::controller(LeadController::class)->group(function () {
        Route::get('/employee/leads', 'index')->name('employee.leads');
        Route::get('employee/lead/create', 'create')->name('lead.create');
        Route::post('employee/lead/create', 'store');
        Route::get('/employee/lead/{lead}/show', 'show')->name('employee.lead.show');
        Route::get('employee/lead/{lead}/edit', 'edit')->name('employee.lead.edit');
        Route::patch('employee/lead/{lead}/edit', 'update');
        Route::delete('employee/lead/{lead}/destroy', 'destroy')->name('employee.lead.destroy');
    });
});

Route::controller(AdminDashboard::class)->group(function () {
    Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
    Route::get('/admin/attendance', 'attendance')->name('admin.attendance');
    Route::get('/admin/lead', 'lead')->name('admin.lead');
    Route::get('/admin/lead/{lead}/show', 'show')->name('admin.lead.show');
    Route::get('/admin/employees', 'employees_todo')->name('admin.employees');
});

Route::controller(ReminderController::class)->group(function () {
    Route::get('/employee/lead/{lead}/reminder', 'index')->name('employee.lead.reminder');
    Route::post('/employee/lead/{lead}/reminder/store', 'store')->name('employee.lead.reminder.store');
});


Route::controller(EmployeeProfileController::class)->group(function () {
    Route::get('/employee/profile', 'index')->name('employee.profile');
    Route::get('/employee/profile/create', 'create')->name('employee.profile.create');
    Route::patch('/employee/profile/store', 'store')->name('employee.profile.store');
});


Route::controller(ContactController::class)->group(function () {
    Route::get('/employee/contact', 'index')->name('employee.contact');
    Route::post('/employee/contact/send_email', 'send_email')->name('employee.contact.send_email');
});


Route::controller(AdminContactController::class)->group(function () {
    Route::get('/admin/contact', 'index')->name('admin.contact');
    Route::delete('admin/contact/{contact}/destroy', 'delete')->name('admin.contact.destroy');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/admin/employee', 'index')->name('admin.employee');
    Route::get('/admin/employee/{employee}/show', 'show')->name('admin.employee.show');
    Route::get('/admin/employee/{employee}/edit', 'edit')->name('admin.employee.edit');
    Route::patch('/admin/employee/{employee}/edit', 'update');
    Route::get('/admin/employee/{employee}/password', 'password')->name('admin.employee.password');
    Route::patch('/admin/employee/{employee}/password', 'password_update');
    Route::delete('/admin/employee/{employee}/destroy', 'destroy')->name('admin.employee.destroy');
});

Route::controller(GalleryController::class)->group(function () {
    Route::get('/employee/gallery', 'index')->name('employee.gallery');
});


Route::controller(ImageController::class)->group(function () {
    Route::get('/employee/gallery/images', 'images')->name('employee.gallery.images');
    Route::post('/employee/gallery/images', 'images_upload');

    Route::get('/employee/gallery/images_view', 'image_view')->name('employee.gallery.image_view');

    Route::delete('/employee/gallery/image/{image}/destroy', 'destroy')->name('employee.gallery.image.destroy');
});

Route::controller(DocumentController::class)->group(function () {
    Route::get('/employee/gallery/files', 'files')->name('employee.gallery.files');
    Route::post('/employee/gallery/files', 'files_upload');

    Route::get('/employee/gallery/files_view', 'file_view')->name('employee.gallery.file_view');

    Route::delete('/employee/gallery/file/{doc}/destroy', 'destroy')->name('employee.gallery.file.destroy');
});

Route::controller(VideoController::class)->group(function () {
    Route::get('/employee/gallery/videos', 'videos')->name('employee.gallery.videos');
    Route::post('/employee/gallery/videos', 'videos_upload');

    Route::get('/employee/gallery/videos_view', 'video_view')->name('employee.gallery.video_view');

    Route::delete('/employee/gallery/video/{video}/destroy', 'destroy')->name('employee.gallery.video.destroy');
});


Route::controller(AdminGalleryController::class)->group(function () {
    Route::get('/admin/gallery', 'index')->name('admin.gallery');
});

Route::controller(GalleryImageController::class)->group(function () {
    Route::get('/admin/gallery/images', 'images')->name('admin.gallery.images');
    Route::post('/admin/gallery/images', 'images_upload');

    Route::get('/admin/gallery/images_view', 'image_view')->name('admin.gallery.image_view');

    Route::delete('/admin/gallery/image/{image}/destroy', 'destroy')->name('admin.gallery.image.destroy');
});

Route::controller(GalleryDocumentController::class)->group(function () {
    Route::get('/admin/gallery/files', 'files')->name('admin.gallery.files');
    Route::post('/admin/gallery/files', 'files_upload');

    Route::get('/admin/gallery/files_view', 'file_view')->name('admin.gallery.file_view');

    Route::delete('/admin/gallery/file/{doc}/destroy', 'destroy')->name('admin.gallery.file.destroy');
});

Route::controller(GalleryVideoController::class)->group(function () {
    Route::get('/admin/gallery/videos', 'videos')->name('admin.gallery.videos');
    Route::post('/admin/gallery/videos', 'videos_upload');

    Route::get('/admin/gallery/videos_view', 'video_view')->name('admin.gallery.video_view');

    Route::delete('/admin/gallery/video/{video}/destroy', 'destroy')->name('admin.gallery.video.destroy');
});

Route::controller(EmployeeGalleryController::class)->group(function() {
    Route::get('/admin/employee_gallery', 'index')->name('admin.employee_gallery');
});
