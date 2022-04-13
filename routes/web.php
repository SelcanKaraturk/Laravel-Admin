<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\Admincontroller;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RoutesController;


use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ChefsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\InstallController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
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


Route::group(['middleware'=>'auth'],function (){
    Route::resource('/install',InstallController::class);
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/about',AboutController::class);
Route::resource('/menu',MenuController::class);
Route::resource('/chefs',ChefsController::class);
Route::resource('/blog',BlogController::class);
Route::resource('/contact',ContactController::class);

Route::get('/profile',[ProfileController::class,'profile'])->name('my_profile');

Route::prefix('admin')->middleware(['auth','admin'])->name('admin.')->group(function (){

    Route::get('/', [Admincontroller::class, 'index'])->name('dashboard');
    Route::get('/routes', [RoutesController::class, 'index'])->name('routes');
    Route::get('/manage-permissions/{role}', [RoleController::class, 'menage_permissions'])->name('manage-permissions');
    Route::post('/manage-permissions-role', [RoleController::class, 'menage_permissions_role'])->name('manage-permissions-role');
    Route::resource('/users',UserController::class);
    Route::resource('/roles',RoleController::class);
    Route::resource('/permissions',PermissionController::class);
    Route::resource('/post',PostController::class);
    Route::resource('/category',CategoryController::class);
    Route::resource('/tag',TagController::class);
    Route::resource('/comment',CommentController::class)->only(['index','destroy']);

});


