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
use App\Http\Livewire\Registration;
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


// Authentication Routes
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login');
Route::post('logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

// Password Reset Routes
Route::get('password/reset', 'App\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'App\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'App\Http\Controllers\Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'App\Http\Controllers\Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes
Route::get('email/verify', 'App\Http\Controllers\Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'App\Http\Controllers\Auth\VerificationController@verify')->name('verification.verify');
Route::post('email/resend', 'App\Http\Controllers\Auth\VerificationController@resend')->name('verification.resend');

Route::get('/enrolment',App\Http\Livewire\Registration::class)->name('enrolment');

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/maintainence',App\Http\Livewire\Maintainences::class)->name('maintainence');

    Route::get('/request_materials',App\Http\Livewire\MaterialRequests::class)->name('request_materials');
    Route::get('/students_parents',AllDetails::class)->name('student_parent');
    Route::get('/siblingslist',Siblingslist::class)->name('siblingslist');
    Route::get('/registration',Registration::class)->name('registration');

});

Route::group(['middleware' => ['auth','admin']], function() { 
    Route::get('/student',App\Http\Livewire\Students::class)->name('student');
 
    Route::get('/parent',ParentsL::class)->name('parent');
    
});

Route::group(['middleware' => ['auth','superadmin']], function() { 
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    
});

