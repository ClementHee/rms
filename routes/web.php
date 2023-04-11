<?php


use App\Http\Livewire\Students;
use App\Http\Livewire\Maintainences;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MaterialRequest;

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




Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::get('/', function () {
        return view('home
        ');
    });
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/maintainence',App\Http\Livewire\Maintainences::class)->name('maintainence');
    Route::get('/student',App\Http\Livewire\Students::class)->name('student');
    Route::get('/parent',App\Http\Livewire\ParentsL::class)->name('parent');
    Route::get('/request_materials',App\Http\Livewire\MaterialRequests::class)->name('request_materials');
});