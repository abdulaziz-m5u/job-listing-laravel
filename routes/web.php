<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
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


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('search', [\App\Http\Controllers\HomeController::class, 'search'])->name('search');
Route::resource('job', \App\Http\Controllers\JobController::class)->only(['index', 'show']);
Route::get('category/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category.show');
Route::get('location/{location}', [\App\Http\Controllers\LocationController::class, 'show'])->name('location.show');

Route::group(['middleware' => 'isAdmin','prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('permissions', \App\Http\Controllers\Admin\PermissionController::class);
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class);
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);

    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('locations', \App\Http\Controllers\Admin\LocationController::class);
    Route::resource('companies', \App\Http\Controllers\Admin\CompanyController::class);
    Route::resource('jobs', \App\Http\Controllers\Admin\JobController::class);
});

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home');
