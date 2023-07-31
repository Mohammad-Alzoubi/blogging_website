<?php

use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();




Route::get('blogging-cms/', function () {
    return redirect()->route('backend.index');
});



// "role:super-admin|sub-admin"
Route::middleware(["auth_admin"])->name("backend.")->group(function () {

    Route::get("/",       [HomeController::class, "index"])->name("index");

    //start user admin
    Route::prefix('user')->name('user.')->group(function () {
        Route::get("/",            [UserController::class, "index"])->name("index")->middleware(['permission:user.all']);
        Route::get("create",       [UserController::class, "create"])->name("create")->middleware(['permission:user.create']);
//        Route::get("/",            [UserController::class, "index"])->name("index");
//        Route::get("create",       [UserController::class, "create"])->name("create");
        Route::post("store-user",  [UserController::class, "store"])->name("store");
        Route::get("edit/{id}",    [UserController::class, "edit"])->name("edit");
        Route::post("update/{id}", [UserController::class, "update"])->name("update");
        Route::post("delete",      [UserController::class, "destroy"])->name("delete");
        Route::get("profile/me",   [UserController::class, "profile"])->name("profile");
//        Route::get("changePassword",   [UserController::class, "changePassword"])->name("changePassword");
    });


    // start posts
    Route::prefix('posts')->name('post.')->group(function () {
        Route::get("/",            [PostController::class, "index"])->name("index");
        Route::get("create",       [PostController::class, "create"])->name("create");
        Route::post("store-user",  [PostController::class, "store"])->name("store");
        Route::get("edit/{id}",    [PostController::class, "edit"])->name("edit");
        Route::post("update/{id}", [PostController::class, "update"])->name("update");
        Route::post("delete",      [PostController::class, "destroy"])->name("delete");
    });


    // Permission All Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/permission','AllPermission')->name('permission.index');
        Route::get('/add/permission','AddPermission')->name('add.permission');
        Route::post('/store/permission','StorePermission')->name('permission.store');
        Route::get('/edit/permission/{id}','EditPermission')->name('edit.permission');
        Route::post('/update/permission/{id}','UpdatePermission')->name('update.permission');
        Route::get('/delete/permission','DeletePermission')->name('delete.permission');
    });


    // Roles All Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/roles','AllRoles')->name('index.roles');
        Route::get('/add/roles','AddRoles')->name('add.roles');
        Route::post('/store/roles','StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}','EditRoles')->name('edit.roles');
        Route::post('/update/roles/{id}','UpdateRoles')->name('update.roles');
        Route::get('/delete/roles/','DeleteRoles')->name('delete.roles');
    });


    // Add Roles in Permission All Route
    Route::controller(RoleController::class)->group(function(){
        Route::get('/all/roles/permission','AllRolesPermission')->name('index.roles.permission');
        Route::get('/add/roles/permission','AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store','StoreRolesPermission')->name('store.role.permission');
        Route::post('/role/permission/update/{id}','RolePermissionUpdate')->name('update.role.permission');
        Route::get('/admin/edit/roles/{id}','AdminEditRoles')->name('admin.edit.roles');
        Route::get('/admin/delete/roles/','AdminDeleteRoles')->name('admin.delete.roles');
    });


});
