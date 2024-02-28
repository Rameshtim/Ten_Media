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
})->name('welcome');


Route::get('/dashboard', function () {
	return view('welcome');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	//routes ohne anmeldung
	Route::get('/job', [JobController::class, 'index'])->name('job.index');
	Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
	Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
	Route::get('/job/create', [JobController::class, 'create'])->name('job.create');
	Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
	Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
	Route::post('/job', [JobController::class, 'store'])->name('job.store');
	Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
	Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
	Route::get('/job/{job}/edit', [JobController::class, 'edit'])->name('job.edit');
	Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
	Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
	Route::put('/job/{job}/update', [JobController::class, 'update'])->name('job.update');
	Route::put('/company/{company}/update', [CompanyController::class, 'update'])->name('company.update');
	Route::put('/category/{category}/update', [CategoryController::class, 'update'])->name('category.update');
	Route::delete('/job/{job}/destroy', [JobController::class, 'destroy'])->name('job.destroy');
	Route::delete('/company/{company}/destroy', [CompanyController::class, 'destroy'])->name('company.destroy');
	Route::delete('/category/{category}/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
	
	Route::get('/job/{job}', [JobController::class, 'show'])->name('job.show');
	Route::get('/company/{company}', [CompanyController::class, 'show'])->name('company.show');
	Route::get('/category/{category}', [CategoryController::class, 'show'])->name('category.show');

});	

require __DIR__.'/auth.php';
