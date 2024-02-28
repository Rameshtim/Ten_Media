<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

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

//routes ohne anmeldung
Route::get('/job', [JobController::class, 'index'])->name('job.index');
Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::post('/job', [JobController::class, 'store'])->name('job.store');

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
