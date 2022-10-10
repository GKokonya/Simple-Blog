<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;

use App\Http\Livewire\Posts;

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


################ HOME PAGE ################################
Route::get('/',[PostController::class,'list'])->name('index');

####################AUTH ROUTES ############################
Auth::routes();

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');

Route::get('single-post/{id}',[PostController::class,'singlePost'])->name('single-post');

############################ ADMIN #############################
Route::prefix('admin')->name('admin.')->group(function(){
    ############################ ROLES #############################
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/{role}/permissions', [RoleController::class,'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class,'revokePermission'])->name('roles.permissions.revoke');

    ############################ PERMISSIONS #############################
    Route::resource('/permissions', PermissionController::class);
    Route::post('/permissions/{permission}/roles/', [PermissionController::class,'assignRole'])->name('permissions.roles');
    Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class,'removeRole'])->name('permissions.roles.remove');

    ########################### POSTS ########################
    Route::resource('/posts', PostController::class);

    ########################### USERS ########################
    Route::resource('/users', UserController::class);
    Route::get('/users/{user}/roles', [UserController::class,'assignRole'])->name('users.roles');
    Route::post('/users/{user}/roles', [UserController::class,'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class,'removeRole'])->name('users.roles.remove');
    
    Route::post('/users/{user}/permissions', [UserController::class,'assignPermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class,'removePermission'])->name('users.permissions.remove');
    
});
############################ ADMIN #############################

