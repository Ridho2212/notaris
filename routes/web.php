<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ServiceFeeController;
use App\Http\Controllers\PpatServiceController;
use App\Http\Controllers\NotaryServiceController;
use App\Http\Controllers\RequestSubmissionController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [AuthController::class, 'login']);
// Route::post('/login', [AuthController::class, 'authenticate']);

Route::resource('users', UserController::class);

Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('pages.dashboard');
});


Route::get('/request-submissions', [RequestSubmissionController::class, 'index'])->name('request-submissions.index');
Route::get('/request-submissions/create', [RequestSubmissionController::class, 'create'])->name('request-submissions.create');
Route::post('/request-submissions', [RequestSubmissionController::class, 'store'])->name('request-submissions.store');
Route::resource('request-submissions', RequestSubmissionController::class);

Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::resource('clients', ClientController::class);

Route::get('/ppat-services', [PpatServiceController::class, 'index'])->name('ppat-services.index');
Route::get('/ppat-services/create', [PpatServiceController::class, 'create'])->name('ppat-services.create');
Route::post('/ppat-services', [PpatServiceController::class, 'store'])->name('ppat-services.store');
Route::resource('ppat-services', PpatServiceController::class);

Route::get('/notary-services', [NotaryServiceController::class, 'index'])->name('notary-services.index');
Route::get('/notary-services/create', [NotaryServiceController::class, 'create'])->name('notary-services.create');
Route::post('/notary-services', [NotaryServiceController::class, 'store'])->name('notary-services.store');
Route::resource('notary-services', NotaryServiceController::class);

Route::get('/service-fees', [ServiceFeeController::class, 'index'])->name('service-fees.index');
Route::get('/service-fees/create', [ServiceFeeController::class, 'create'])->name('service-fees.create');
Route::post('/service-fees', [ServiceFeeController::class, 'store'])->name('service-fees.store');
Route::resource('service-fees', ServiceFeeController::class);
Route::get('/service-fees/{id}/print', [ServiceFeeController::class, 'print'])->name('service-fees.print');


Route::get('/documents', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/documents/create', [DocumentController::class, 'create'])->name('documents.create');
Route::post('/documents', [DocumentController::class, 'store'])->name('documents.store');
Route::resource('documents', DocumentController::class);






// Route::get('/request_submissions', function () {
//     return view('pages.request_submissions.index');
// });

// Route::get('/jenis_pemohonan', [Jenis_PemohonanController::class, 'index']);
// Route::get('/pemohonan/create', [Jenis_PemohonanController::class, 'create']);
// Route::get('/pemohonan/{id}', [Jenis_PemohonanController::class, 'edit']);
// Route::post('/jenis_pemohonan', [Jenis_PemohonanController::class, 'store']);
// Route::put('/jenis_pemohonan/{id}', [Jenis_PemohonanController::class, 'update']);
// Route::delete('/jenis_pemohonan/{id}', [Jenis_PemohonanController::class, 'delete']);