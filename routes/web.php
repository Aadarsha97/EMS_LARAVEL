<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalaryController;
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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');

Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');
Route::post('/analytics', [AnalyticsController::class, 'changemonth'])->name('analytics.changemonth');
Route::post('/analytics/fetch', [AnalyticsController::class, 'fetch'])->name('analytics.fetch');



Route::resource('/departments', DepartmentController::class);
Route::resource('/employee', EmployeeController::class);
Route::resource('/salary', SalaryController::class);
Route::get('/salary/{id}/paid', [SalaryController::class, 'paid'])->name('salary.paid');

Route::resource('/roles', RoleController::class);

Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::get('permissions/{id}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{role_id}/{permission_id}/delete', [PermissionController::class, 'destroy'])->name('permissions.destroy');
Route::get('/permissions/{id}/manage', [PermissionController::class, 'manage'])->name('permissions.manage');



Route::get('/roles/{id}/manage', [RoleController::class, 'manage'])->name('roles.manage');

Route::view('/dmk', 'Admin.roles.manage');

Route::resource('/attendance', AttendanceController::class);

Route::post('/attendance', [AttendanceController::class, 'store'])->name('attendance.store');
Route::resource('/leave', LeaveController::class);
Route::get('/attendance/{id}/history', [AttendanceController::class, 'history'])->name('attendance.history');
Route::post('attendance/changemonth', [AttendanceController::class, 'changemonth'])->name('attendance.changemonth');




Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
Route::get('/notice/create', [NoticeController::class, 'create'])->name('notice.create');
Route::get('notice/{id}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
Route::post('/notice', [NoticeController::class, 'store'])->name('notice.store');
Route::get('/notice/{id}/delete', [NoticeController::class, 'destroy'])->name('notice.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
