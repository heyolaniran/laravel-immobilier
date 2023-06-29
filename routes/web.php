<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/biens' , [PropertyController::class, 'index'])->name('property') ; 


Route::get('/biens/{slug}-{property}' , [PropertyController::class , 'show'])->name('property.show')->where([
    'slug' => '[0-9a-z\-]+', 
    'property' => '[0-9]+'
]) ; 

Route::post('/biens/{property}/contact', [PropertyController::class , 'contact'])->name('property.contact')
->where([
    'property' => '[0-9]+'
]) ; 


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->name("admin.")->middleware('auth')->group(function () { 
    Route::resource("properties",App\Http\Controllers\Admin\PropertyController::class)->except(['show']) ; 
    Route::resource("options", OptionController::class)->except(['show']) ; 
}) ; 
require __DIR__.'/auth.php';
