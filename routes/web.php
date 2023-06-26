<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;

use App\Http\Controllers\Admin\OptionController;

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

Route::get('/', [HomeController::class , 'index']);



Route::get('/biens' , [PropertyController::class, 'index'])->name('property') ; 


Route::get('/biens/{slug}-{property}' , [PropertyController::class , 'show'])->name('property.show')->where([
    'slug' => '[0-9a-z\-]+', 
    'id' => '[0-9]+'
]) ; 

Route::prefix('admin')->name("admin.")->group(function () { 
    Route::resource("properties",App\Http\Controllers\Admin\PropertyController::class)->except(['show']) ; 
    Route::resource("options", OptionController::class)->except(['show']) ; 
}) ; 
