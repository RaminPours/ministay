<?php
use App\Http\Controllers\BookingController; use App\Http\Controllers\ProfileController; use App\Http\Controllers\PropertyController; use Illuminate\Support\Facades\Route;
Route::get('/',fn()=>redirect()->route('properties.index'));
Route::get('/properties',[PropertyController::class,'index'])->name('properties.index');
Route::middleware('auth')->group(function(){
 Route::get('/properties/create',[PropertyController::class,'create'])->name('properties.create');
 Route::post('/properties',[PropertyController::class,'store'])->name('properties.store');
 Route::delete('/properties/{property}',[PropertyController::class,'destroy'])->name('properties.destroy');
 Route::get('/dashboard',fn()=>view('dashboard'))->name('dashboard');
 Route::get('/my-bookings',[BookingController::class,'index'])->name('bookings.index');
 Route::post('/properties/{property}/bookings',[BookingController::class,'store'])->name('bookings.store');
 Route::patch('/bookings/{booking}/cancel',[BookingController::class,'cancel'])->name('bookings.cancel');
 Route::get('/profile',[ProfileController::class,'edit'])->name('profile.edit');
 Route::patch('/profile',[ProfileController::class,'update'])->name('profile.update');
 Route::delete('/profile',[ProfileController::class,'destroy'])->name('profile.destroy');
});
Route::get('/properties/{property}',[PropertyController::class,'show'])->name('properties.show');
require __DIR__.'/auth.php';