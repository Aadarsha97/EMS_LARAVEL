<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
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

Route::get('/dashboard', function () {
    return view('Admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::get('/employee', [EmployeeController::class, 'index'])->name('employee.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');




Route::resource('/departments', DepartmentController::class);
Route::resource('/employee', EmployeeController::class);

Route::resource('/roles', RoleController::class);
Route::resource('/permissions', PermissionController::class);
Route::get('/roles/manage', [RoleController::class, 'manage'])->name('roles.manage');

Route::view('/dmk', 'Admin.roles.manage');




Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');


Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
