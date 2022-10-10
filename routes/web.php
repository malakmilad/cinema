<?php

use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\EventdayController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\RealationController;
use App\Http\Controllers\Admin\ShowtimeController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('event',[EventController::class,'index']);


Auth::routes();
route::get('/logout',function(){
     Auth::logout();
      return view('welcome');
  })->name('logout');
Route::post('home/store',[HomeController::class,'store'])->name('home.store');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/')->middleware(['auth','role'])->group(function(){
        /**
     * eventdays routing
     */
Route::get('event/add',[EventdayController::class,'index'])->name('event.add');
Route::post('event/store',[EventdayController::class,'store'])->name('event.store');
Route::get('event/show',[EventdayController::class,'show'])->name('event.show');
Route::get('event/edit/{id}',[EventdayController::class,'edit'])->name('event.edit');
Route::post('event/update/{id}',[EventdayController::class,'update'])->name('event.update');
Route::get('event/delete/{id}',[EventdayController::class,'delete'])->name('event.delete'); 
/**
     * showtimes routing
     */

Route::get('showtime/add',[ShowtimeController::class,'index'])->name('showtime.add');
Route::post('showtime/store',[ShowtimeController::class,'store'])->name('showtime.store');
Route::get('showtime/show',[ShowtimeController::class,'show'])->name('showtime.show');
Route::get('showtime/edit/{id}',[ShowtimeController::class,'edit'])->name('showrtime.edit');
Route::post('showtime/update/{id}',[ShowtimeController::class,'update'])->name('showrtime.update');
Route::get('showtime/delete/{id}',[ShowtimeController::class,'delete'])->name('showrtime.delete');

    /**
     * movies routing
     */
Route::get('movie/add',[MovieController::class,'index'])->name('movie.add');
Route::post('movie/store',[MovieController::class,'store'])->name('movie.store');
Route::get('movie/show',[MovieController::class,'show'])->name('movie.show');
Route::get('movie/edit/{id}',[MovieController::class,'edit'])->name('movie.edit');
Route::post('movie/update/{id}',[MovieController::class,'update'])->name('movie.update');
Route::get('movie/delete/{id}',[MovieController::class,'delete'])->name('movie.delete');

/**
     * users or visitors routing
     */
Route::get('user/index',[HomeController::class,'show'])->name('user.index');    
});



