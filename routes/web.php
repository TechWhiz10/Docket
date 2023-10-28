<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

use App\Livewire\Users;
use App\Livewire\UsersCustomerDetail;
use App\Livewire\Customers;
use App\Livewire\CustomerAdd;
use App\Livewire\Companies;

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
    // return view('dashboard');
    return redirect()->route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',     [AuthController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');
});

/**
 * Authentication Route
 */

Route::get('/user',                         Users::class)->name('user');
Route::get('/user/{id}',                    UsersCustomerDetail::class)->name('user.customer-detail');
Route::get('/customer',                     Customers::class)->name('customer');
Route::get('/customer/add',                 CustomerAdd::class)->name('customer.add');
Route::get('/company',                      Companies::class)->name('company');
