<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/', [HomeController::class, '__invoke'])->name('home');


Route::prefix('/mission')->group(function () {
    Route::get('/', [MissionController::class, 'create'])->name('mission.create');
});

Route::get('freelancer/{user}', [FreelancerController::class, 'show'])->name('freelancer.show');




Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/mettre-les-informations-à-jour', [ProfileController::class, 'edit_freelancer_information'])->name('profil.edit.freelancer_information');
    Route::get('/supprimer-le-cv/{str}', [ProfileController::class, 'delete_cv'])->name('delete.cv');
    Route::get('/acheter-un-pack/{plan?}', [SubscriptionController::class, 'create'])->name('subscription.create');
    Route::get('/paiement-réussi', [SubscriptionController::class, 'ipn_success'])->name('ipn.success');
    
});




require __DIR__.'/auth.php';