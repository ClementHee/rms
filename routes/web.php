<?php



use App\Http\Livewire\ParentsL;
use App\Http\Livewire\Students;
use App\Events\NewMaterialRequest;
use App\Http\Livewire\Maintainences;
use App\Http\Livewire\Relationships;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MaterialRequest;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Livewire\AllDetails;
use App\Http\Livewire\Siblingslist;
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
    
      

    Route::view('/powergrid', 'powergrid-demo');
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/maintainence',App\Http\Livewire\Maintainences::class)->name('maintainence');

    Route::get('/request_materials',App\Http\Livewire\MaterialRequests::class)->name('request_materials');
    Route::get('/students_parents',AllDetails::class)->name('student_parent');
    Route::get('/siblingslist',Siblingslist::class)->name('siblingslist');

});

Route::group(['middleware' => ['auth','admin']], function() { 
    Route::get('/student',App\Http\Livewire\Students::class)->name('student');
    Route::get('/parent',ParentsL::class)->name('parent');
    
});

Route::group(['middleware' => ['auth','superadmin']], function() { 
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    
});

