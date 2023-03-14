<?php

use App\Http\Controllers\DriverController;
use App\Http\Controllers\ParentController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

    // <drivers routes>
    Route::controller(DriverController::class)->group(function(){
        
        Route::get('driver','index')->name('drivers.index');

        Route::get('driver/add','add')->name('driver.add');
        Route::post('driver/store','store')->name('driver.store');

        Route::get('driver/edit/{id}','edit')->name('driver.edit');
        Route::post('driver/update,{id}','update')->name('driver.update'); 


        Route::get('driver/destroy,{id}','destroy')->name('driver.destroy'); 
    });
    
    // </drivers routes>
    
    Route::controller(ParentController::class)->group(function(){
        
        
        Route::get('parents','index')->name('parent.index');
    });

require __DIR__.'/auth.php';