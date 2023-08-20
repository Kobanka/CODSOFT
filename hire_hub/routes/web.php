<?php

use App\Http\Controllers;
use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;


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

// Routes for Jobs
Route::get('/', [Controllers\ListingController::class, 'index'])->name('listings.index');

Route::get('/jobs', [Controllers\ListingController::class, 'getJobs'])->name('listings.jobs');
Route::get('/companies', [Controllers\ListingController::class, 'getCompanies'])->name('listings.companies');
Route::get('/candidates', [Controllers\ListingController::class, 'getCandidates'])->name('listings.candidates');

Route::get('/new', [Controllers\ListingController::class, 'create'])->name('listings.create')->middleware(['auth', 'verified']);

Route::post('/new', [Controllers\ListingController::class, 'store'])->name('listings.store')->middleware(['auth', 'verified']);


//Route for Contacting
Route::get('/contact', [Controllers\ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [Controllers\ContactController::class, 'send'])->name('contact.send');


// Handling Routes For Candidates
Route::get('/candidate/show/{candidate}', [Controllers\CandidateController::class, 'index'])->name('candidate.show')->middleware(['auth', 'verified']);
Route::get('/candidate/edit/{candidate}', [Controllers\CandidateController::class, 'edit'])->name('candidate.edit')->middleware(['auth', 'verified']);
Route::put('/candidate/edit/{candidate}', [Controllers\CandidateController::class, 'update'])->name('candidate.update')->middleware(['auth', 'verified']);
Route::get('/candidate/jobs/{candidate}', [Controllers\CandidateController::class, 'getJobs'])->name('candidate.jobs')->middleware(['auth', 'verified']);


// Handling Routes For Company
Route::get('/company/show/{company}', [Controllers\CompanyController::class, 'index'])->name('company.show')->middleware(['auth', 'verified']);
Route::get('/company/edit/{company}', [Controllers\CompanyController::class, 'edit'])->name('company.edit')->middleware(['auth', 'verified']);
Route::put('/company/edit/{company}', [Controllers\CompanyController::class, 'update'])->name('company.update')->middleware(['auth', 'verified']);
Route::get('/company/jobs/{company}', [Controllers\CompanyController::class, 'getJobs'])->name('company.jobs')->middleware(['auth', 'verified']);


require __DIR__.'/auth.php';

// Catch up route. It is displayed if any of above route don't resolve
Route::get('/{listing}', [Controllers\ListingController::class, 'show'])->name('listings.show')->middleware(['auth', 'verified']);

Route::get('/{listing}/apply', [Controllers\ListingController::class, 'apply'])->name('listings.apply')->middleware(['auth', 'verified']);

