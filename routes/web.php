<?php

use App\Http\Controllers\ArchiveController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CommentHistoriesController;
use App\Http\Controllers\DocmentAssignedDepartmentController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
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

// Auth::routes();
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login');

// Main dashboard auth needed
Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index'])->name('dashboard');

    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::resource('users', UserController::class);
    Route::get('user/{id}/permission', [PermissionController::class, 'userPermissions'])->name('user.permissions');
    Route::delete('user/{userId}/permission/{permissionId}', [PermissionController::class, 'revokePermission'])->name('user.permission.revoke');
    Route::post('user/{id}/permissions', [PermissionController::class, 'grantPermissions'])->name('user.permission.grant');

    // Route::get('document/index', [DocumentController::class, 'index'])->name('document.index');
    Route::get('document/search', [DocumentController::class, 'search'])->name('document.search');

   
    //Documents Routes
    Route::get('documents', [DocumentController::class, 'index'])->name('documents.index');
    Route::get('document/create', [DocumentController::class, 'create'])->name('documents.create');
    Route::post('documents', [DocumentController::class, 'store'])->name('documents.store');
    Route::get('documents/{id}/edit', [DocumentController::class, 'edit'])->name('documents.edit');
    Route::put('documents/{id}/update', [DocumentController::class, 'update'])->name('documents.update');
    Route::get('documents/{id}', [DocumentController::class, 'show'])->name('documents.show');
    Route::delete('document/{id}', [DocumentController::class, 'destroy'])->name('document.destroy');

    Route::get('document/{id}/assignedDepartments', [DocmentAssignedDepartmentController::class, 'show'])->name('document.assigned.departments');
    Route::post('document/{id}/store/assignedDepartments', [DocmentAssignedDepartmentController::class, 'store'])->name('document.assigned.departments.store');

    Route::get('department/documents', [DocmentAssignedDepartmentController::class, 'index'])->name('department.documents');
    Route::get('department/{departmentId}/document/{documentId}/show', [DocmentAssignedDepartmentController::class, 'departmentDocumentShow'])->name('department.document.show');
    Route::post('department/document/{documentId}/status/update', [DocmentAssignedDepartmentController::class, 'update'])->name('department.document.status.update');

    Route::get('document/{id}/archive', [ArchiveController::class, 'store'])->name('document.archive');
    Route::get('archive/documents', [ArchiveController::class, 'index'])->name('archive.documents');
    Route::put('archive/{id}/address/update', [ArchiveController::class, 'update'])->name('archive.address.update');

    Route::get('report', [ReportController::class, 'index'])->name('report.all');
    Route::get('report/show', [ReportController::class, 'show'])->name('report.show');
    Route::get('report/print', [ReportController::class, 'print'])->name('report.print');

    Route::get('department/{documentAssignedDepartmentId}/document/comments',[CommentHistoriesController::class,'show'])->name('department.document.comments.show');
    Route::post('department/{documentAssignedDepartmentId}/document/comments/store',[CommentHistoriesController::class,'store'])->name('department.document.comment.store');
});
