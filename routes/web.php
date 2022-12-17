<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;

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
Route::get('/',[PostController::class,'index'])->name('index');

####################AUTH ROUTES ############################
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');




    #passwords
    Route::group(['prefix'=> 'users',],function(){
        Route::get('/{user}/editpassword',[UserController::class,'editPassword'])->name('users.editpassword')->middleware('can:change own password');
        Route::put('/{user}',[UserController::class,'updatePassword'])->name('users.updatepassword')->middleware('can:change own password');

        Route::get('/{user}/edit-other-user-password',[UserController::class,'editOtherUserPassword'])->name('users.edit-other-user-password')->middleware('can:change other user password');
        Route::put('/edit-other-user-password/{user}',[UserController::class,'updateOtherUserPassword'])->name('users.update-other-user-password')->middleware('can:change other user password');
    });

 
    ########################### POSTS ########################

    Route::group(['prefix'=> 'posts',],function(){
        Route::get('/',App\Http\Livewire\IndexPosts::class)->name('posts.index')->middleware('can:view posts');
        Route::get('/create',[PostController::class,'create'])->name('posts.create')->middleware('can:create post');
        Route::post('/',[PostController::class,'store'])->name('posts.store')->middleware('can:create post');
        Route::get('/{post}/edit',[PostController::class,'edit'])->name('posts.edit')->middleware('can:edit post');
        Route::put('/{post}',[PostController::class,'update'])->name('posts.update')->middleware('can:edit post');
        Route::delete('/{post}',[PostController::class,'destroy'])->name('roles.destroy')->middleware('can:delete post');
        Route::get('/show/{id}',[PostController::class,'show'])->name('posts.show');
    });



    Route::group(['prefix'=> 'categories',],function(){
        Route::get('/',App\Http\Livewire\IndexCategories::class)->name('categories.index')->middleware('can:view categories');
        Route::get('/create',[CategoryController::class,'create'])->name('categories.create')->middleware('can:create category');
        Route::post('/',[CategoryController::class,'store'])->name('categories.store')->middleware('can:create category');
        Route::get('/{category}/edit',[CategoryController::class,'edit'])->name('categories.edit')->middleware('can:edit category');
        Route::put('/{category}',[CategoryController::class,'update'])->name('categories.update')->middleware('can:edit category');
        Route::delete('/{category}',[CategoryController::class,'destroy'])->name('categories.destroy')->middleware('can:delete category');
    });


    #user permissions
    Route::group(['prefix'=> 'permissions'],function(){
        #roles
        //Route::resource('roles', RoleController::class)->except('show')->middleware('can:manage roles');

        Route::group(['prefix'=> 'roles',],function(){
            //Route::get('/',[RoleController::class,'index'])->name('roles.index')
            Route::get('/',App\Http\Livewire\IndexRoles::class)->name('roles.index')->middleware('can:view roles');
            Route::get('/create',[RoleController::class,'create'])->name('roles.create')->middleware('can:create role');
            Route::post('/',[RoleController::class,'store'])->name('roles.store')->middleware('can:create role');
            Route::get('/{role}/edit',[RoleController::class,'edit'])->name('roles.edit')->middleware('can:edit role');
            Route::patch('/{role}',[RoleController::class,'update'])->name('roles.update')->middleware('can:edit role');
            Route::delete('/{role}',[RoleController::class,'destroy'])->name('roles.destroy')->middleware('can:delete role');
        });
        
        #permissions
        //Route::resource('permissions', PermissionController::class)->except('show')->middleware('can:manage permissions');

        Route::group(['prefix'=> 'permissions',],function(){
            Route::get('/',App\Http\Livewire\IndexPermissions::class)->name('permissions.index')->middleware('can:view permissions');
            Route::get('/create',[PermissionController::class,'create'])->name('permissions.create')->middleware('can:create permission');
            Route::post('/',[PermissionController::class,'store'])->name('permissions.store')->middleware('can:create permission');
            Route::get('/{permission}/edit',[PermissionController::class,'edit'])->name('permissions.edit')->middleware('can:edit permission');
            Route::patch('/{permission}',[PermissionController::class,'update'])->name('permissions.update')->middleware('can:edit permission');
            Route::delete('/{permission}',[permissionController::class,'destroy'])->name('permissions.destroy')->middleware('can:delete permission');
        });

        #users
        //Route::resource('users', UserController::class)->only('index', 'edit', 'update');

        Route::group(['prefix'=> 'users',],function(){
            Route::get('/',App\Http\Livewire\IndexUsers::class)->name('users.index')->middleware('can:view users');
            Route::get('/create',[UserController::class,'create'])->name('users.create')->middleware('can:create user');
            Route::post('/',[UserController::class,'store'])->name('users.store')->middleware('can:create user');
            Route::get('/{user}/edit',[UserController::class,'edit'])->name('users.edit')->middleware('can:edit user');
            Route::patch('/{user}',[UserController::class,'update'])->name('users.update')->middleware('can:edit user');
        });
    }); 
############################ ADMIN #############################
