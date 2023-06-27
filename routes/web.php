<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
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
    'property' => '[0-9]+'
]) ; 

Route::post('/biens/{property}/contact', [PropertyController::class , 'contact'])->name('property.contact')
->where([
    'property' => '[0-9]+'
]) ; 

Route::get("/login",  [AuthController::class, 'login'])->name('login')->middleware('guest') ; 
Route::post('/login', [AuthController::class, 'doLogin']) ; 
Route::delete('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout'); 

Route::prefix('admin')->name("admin.")->middleware('auth')->group(function () { 
    Route::resource("properties",App\Http\Controllers\Admin\PropertyController::class)->except(['show']) ; 
    Route::resource("options", OptionController::class)->except(['show']) ; 
}) ; 
