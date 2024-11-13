<?php

use App\Models\FullProcurement;
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
use App\Http\Controllers\admin\EmployeeGalleryController;
use App\Http\Controllers\admin\profile\ProfileController;
use App\Http\Controllers\employee\gallery\FileController;
use App\Http\Controllers\employee\gallery\ImageController;
use App\Http\Controllers\employee\gallery\VideoController;
use App\Http\Controllers\admin\procurement\ProcurementMonth;
use App\Http\Controllers\employee\gallery\DocumentController;
use App\Http\Controllers\employee\dashboard\DashboardController;
use App\Http\Controllers\admin\procurement\ProcurementController;
use App\Http\Controllers\employee\attendance\AddAttendanceController;
use App\Http\Controllers\admin\procurement\ProcurementMonthController;
use App\Http\Controllers\admin\ContactController as AdminContactController;
use App\Http\Controllers\admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\admin\gallery\ImageController as GalleryImageController;
use App\Http\Controllers\admin\gallery\VideoController as GalleryVideoController;
use App\Http\Controllers\employee\ProfileController as EmployeeProfileController;
use App\Http\Controllers\admin\gallery\DocumentController as GalleryDocumentController;
use App\Http\Controllers\admin\LeadController as AdminLeadController;
use App\Http\Controllers\admin\procurement\AssignLaptopController;
use App\Http\Controllers\admin\procurement\FullProcurementController;
use App\Http\Controllers\admin\TodoController as AdminTodoController;
use App\Http\Controllers\superadmin\AttendanceController;
use App\Http\Controllers\superadmin\DashboardController as SuperadminDashboardController;
use App\Http\Controllers\superadmin\EmployeeController as SuperadminEmployeeController;
use App\Http\Controllers\superadmin\gallery\DocumentController as SuperadminGalleryDocumentController;
use App\Http\Controllers\superadmin\gallery\ImageController as SuperadminGalleryImageController;
use App\Http\Controllers\superadmin\gallery\VideoController as SuperadminGalleryVideoController;
use App\Http\Controllers\superadmin\GalleryController as SuperadminGalleryController;
use App\Http\Controllers\superadmin\LeadController as SuperadminLeadController;
use App\Http\Controllers\superadmin\TodoController as SuperadminTodoController;

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

        // after add this
        Route::get('/admin/profile/show_more', 'add_more')->name('admin.profile.add_more');
        Route::get('/admin/profile/create', 'create')->name('admin.profile.create');
        Route::patch('/admin/profile/store', 'store')->name('admin.profile.store');

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

    Route::controller(AdminDashboard::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('admin.dashboard');
        Route::get('/admin/attendance', 'attendance')->name('admin.attendance');
        Route::get('/admin/lead', 'lead')->name('admin.lead');
        Route::get('/admin/lead/{lead}/show', 'show')->name('admin.lead.show');
        Route::get('/admin/employees', 'employees_todo')->name('admin.employees');
    });

    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/admin/your_attendance', 'index')->name('admin.your_attendance');

        Route::get('/admin/your_attendance', 'addattendance')->name('admin.your_attendance');
        Route::post('/admin/your_attendance/mark', 'mark')->name('admin.your_attendance.mark');
        Route::post('/admin/your_attendance/leave', 'leave')->name('admin.your_attendance.leave');
        Route::get('/admin/your_attendance/show', 'yourattendance')->name('admin.your_attendance.show');
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

    Route::controller(EmployeeGalleryController::class)->group(function () {
        Route::get('/admin/employee_gallery', 'index')->name('admin.employee_gallery');
    });

    Route::controller(ProcurementController::class)->group(function () {
        Route::get('/admin/procurement', 'index')->name('admin.procurement');
    });

    Route::controller(ProcurementMonthController::class)->group(function () {
        Route::get('/admin/procurement/monthly_procurement', 'index')->name('admin.procurement.monthly_procurement');
        Route::get('/admin/procurement/monthly_procurement/create', 'create')->name('admin.procurement.monthly_procurement.create');
        Route::post('/admin/procurement/monthly_procurement/create', 'store');
        Route::get('/admin/procurement/{procurement}/monthly_procurement/edit', 'edit')->name('admin.procurement.monthly_procurement.edit');
        Route::patch('/admin/procurement/{procurement}/monthly_procurement/edit', 'update');
        Route::delete('/admin/procurement/{procurement}/monthly_procurement/destroy', 'destroy')->name('admin.procurement.monthly_procurement.destroy');
    });

    Route::controller(FullProcurementController::class)->group(function () {
        Route::get('/admin/procurement/full_procurement', 'index')->name('admin.procurement.full_procurement');
        Route::get('/admin/procurement/full_procurement/create', 'create')->name('admin.procurement.full_procurement.create');
        Route::post('/admin/procurement/full_procurement/create', 'store');
        Route::get('/admin/procurement/{procurement}/full_procurement/edit', 'edit')->name('admin.procurement.full_procurement.edit');
        Route::patch('/admin/procurement/{procurement}/full_procurement/edit', 'update');
        Route::delete('/admin/procurement/{procurement}/full_procurement/destroy', 'destroy')->name('admin.procurement.full_procurement.destroy');
    });

    Route::controller(AssignLaptopController::class)->group(function () {
        Route::get('/admin/procurement/assign_laptop_procurement', 'index')->name('admin.procurement.assign_laptop_procurement');
        Route::get('/admin/procurement/assign_laptop_procurement/create', 'create')->name('admin.procurement.assign_laptop_procurement.create');
        Route::post('/admin/procurement/assign_laptop_procurement/create', 'store');
        Route::get('/admin/procurement/{laptop}/assign_laptop_procurement/edit', 'edit')->name('admin.procurement.assign_laptop_procurement.edit');
        Route::patch('/admin/procurement/{laptop}/assign_laptop_procurement/edit', 'update');
        Route::delete('/admin/procurement/{laptop}/assign_laptop_procurement/destroy', 'destroy')->name('admin.procurement.assign_laptop_procurement.destroy');
    });


    Route::controller(AdminLeadController::class)->group(function () {
        Route::get('/admin/admin_lead', 'index')->name('admin.admin_lead');
        Route::get('/admin/admin_lead/create', 'create')->name('admin.admin_lead.create');
        Route::post('/admin/admin_lead/create', 'store');
        Route::get('/admin/admin_lead/{lead}/show', 'show')->name('admin.admin_lead.show');
        Route::get('/admin/admin_lead/{lead}/edit', 'edit')->name('admin.admin_lead.edit');
        Route::patch('admin/admin_lead/{lead}/edit', 'update');
        Route::delete('admin/admin_lead/{lead}/destroy', 'destroy')->name('admin.admin_lead.destroy');
    });

    Route::controller(AdminTodoController::class)->group(function () {
        Route::get('/admin/admin_todo', 'index')->name('admin.admin_todo');
        Route::post('/admin/admin_todo', 'store');
        Route::get('/admin/admin_todo/{task}/edit', 'edit')->name('admin.admin_todo.edit');
        Route::patch('/admin/admin_todo/{task}/update', 'update')->name('admin.admin_todo.update');
        Route::delete('/admin/admin_todo/{task}/destroy', 'destroy')->name('admin.admin_todo.destroy');
    });

    Route::controller(SuperadminDashboardController::class)->group(function () {
        // Route::middleware(RedirectIfAuthenticated::class)->group(function () {
        Route::get('/superadmin/dashboard', 'index')->name('superadmin.dashboard');
        // });
    });

    Route::controller(SuperadminTodoController::class)->group(function () {
        Route::get('/superadmin/admin_todo', 'index')->name('superadmin.admin_todo');
    });

    Route::controller(SuperadminLeadController::class)->group(function () {
        Route::get('/superadmin/admin_lead', 'index')->name('superadmin.admin_lead');
        Route::get('/superadmin/admin_lead/{lead}/show', 'show')->name('superadmin.admin_lead.show');
    });

    Route::controller(SuperadminGalleryController::class)->group(function () {
        Route::get('/superadmin/gallery', 'index')->name('superadmin.gallery');
    });


    Route::controller(SuperadminGalleryImageController::class)->group(function () {
        Route::get('/superadmin/gallery/images', 'images')->name('superadmin.gallery.images');
        Route::post('/superadmin/gallery/images', 'images_upload');

        Route::get('/superadmin/gallery/images_view', 'image_view')->name('superadmin.gallery.image_view');

        Route::delete('/superadmin/gallery/image/{image}/destroy', 'destroy')->name('superadmin.gallery.image.destroy');
    });

    Route::controller(SuperadminGalleryDocumentController::class)->group(function () {
        Route::get('/superadmin/gallery/files', 'files')->name('superadmin.gallery.files');
        Route::post('/superadmin/gallery/files', 'files_upload');

        Route::get('/superadmin/gallery/files_view', 'file_view')->name('superadmin.gallery.file_view');

        Route::delete('/superadmin/gallery/file/{doc}/destroy', 'destroy')->name('superadmin.gallery.file.destroy');
    });

    Route::controller(SuperadminGalleryVideoController::class)->group(function () {
        Route::get('/superadmin/gallery/videos', 'videos')->name('superadmin.gallery.videos');
        Route::post('/superadmin/gallery/videos', 'videos_upload');

        Route::get('/superadmin/gallery/videos_view', 'video_view')->name('superadmin.gallery.video_view');

        Route::delete('/superadmin/gallery/video/{video}/destroy', 'destroy')->name('superadmin.gallery.video.destroy');
    });

    Route::controller(AttendanceController::class)->group(function () {
        Route::get('/superadmin.attendance', 'index')->name('superadmin.attendance');
    });

    Route::controller(SuperadminEmployeeController::class)->group(function () {
        Route::get('/superadmin/employee_info', 'index')->name('superadmin.employee_info');
        Route::get('/superadmin/employee_info/{employee}/show', 'show')->name('superadmin.employee_info.show');
        Route::get('/superadmin/employee_info/{employee}/edit', 'edit')->name('superadmin.employee_info.edit');
        Route::patch('/superadmin/employee_info/{employee}/edit', 'update');
        Route::get('/superadmin/employee_info/{employee}/password', 'password')->name('superadmin.employee_info.password');
        Route::patch('/superadmin/employee_info/{employee}/password', 'password_update');
        Route::delete('/superadmin/employee_info/{employee}/destroy', 'destroy')->name('superadmin.employee_info.destroy');
    });
});
