<?php

use App\Http\Controllers\CountryController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Models\Department;
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

Route::get("/", function(){
    return view('home');
});

Route::prefix("/dashboard")->group(function () {
    Route::prefix("/country")->controller(CountryController::class)->group(function () {
        Route::get("/",'index');
        Route::get('/create', 'create');
        Route::post('/store', 'store');
        Route::get('/edit/{id}','edit');
        Route::post('/update/{id}','update');
        Route::get('/delete/{id}','destroy');
    });

    Route::prefix('/user')->controller(UserController::class)->group(function(){
        Route::get('/','index');
        Route::get('/create','create');
        Route::post('/store','store');
        Route::get('/edit/{id}','edit');
        Route::post('/update/{id}','update');
        Route::get('/delete/{id}','destroy');
    });

    Route::prefix('company')->controller(CompanyController::class)->group(function(){
        Route::get('/','index');
        Route::get('/create','create');
        Route::post('/store','store');
        Route::get('/edit/{id}','edit');
        Route::post('/update/{id}','update');
        Route::get('/delete/{id}','destroy');

        Route::prefix('/{id}/department')->group(function(){
            Route::post('/add','addDepartment');
        });
    });

    Route::prefix('/department')->controller(DepartmentController::class)->group(function(){
        Route::get('/delete/{id}','destroy');
    });
});


    
