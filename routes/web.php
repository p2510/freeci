<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ApplicantMissionController;

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

// for missions
Route::prefix('/mission')->group(function () {
    Route::get('/', [MissionController::class, 'index'])->name('mission.index');
    Route::post('/recherche', [MissionController::class, 'search'])->name('mission.search');
    Route::get('/plus-récents', [MissionController::class, 'recent'])->name('mission.recent');
    Route::get('/publier', [MissionController::class, 'create'])->name('mission.create');
    Route::post('/publier', [MissionController::class, 'store'])->name('mission.store');
    Route::middleware('auth')->group(function () {
       Route::get('/mes-missions', [ApplicantMissionController::class, 'index'])->name('applicant.mission.index');
       Route::post('/postuler/{mission}', [ApplicantMissionController::class, 'store'])->name('applicant.mission.store');
       Route::patch('/modifier', [ApplicantMissionController::class, 'update'])->name('applicant.mission.update');
       Route::get('/{mission}', [MissionController::class, 'show'])->name('mission.show');
       Route::delete('/supprimer/{id}', [ApplicantMissionController::class, 'destroy'])->name('applicant.mission.delete');
    });
});

// for categories
Route::get('/catégorie/{category}', [CategoryController::class, '__invoke'])->name('category.index');

// suivis missions et messagerie 

Route::get('/entrez-code-mission', [FollowController::class, 'create'])->name('follow.search');
Route::post('/entrez-code-mission', [FollowController::class, 'store'])->name('follow.store');
Route::patch('/accepter-mission', [FollowController::class, 'accepted'])->name('follow.accepted');
Route::prefix('/messagerie-mission')->group(function () {
        Route::get('/{mission}', [MessageController::class, 'index_recrutor'])->name('message.index.recrutor');
        Route::post('/', [MessageController::class, 'store_recrutor'])->name('message.store.recrutor');
});


    

// for freelancers
Route::prefix('freelancer')->group(function () {
    Route::get('/', [FreelancerController::class, 'index'])->name('freelancer.index');
    Route::get('/{user}', [FreelancerController::class, 'show'])->name('freelancer.show');
});
Route::get('/en-ligne', [FreelancerController::class, 'onlineFreelancer'])->name('freelancer.online');
Route::get('/les-nouveaux', [FreelancerController::class, 'newFreelancer'])->name('freelancer.new');



//profil freelancer 
Route::middleware('auth')->group(function () {
     // information
    Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/mettre-les-informations-à-jour', [ProfileController::class, 'edit_freelancer_information'])->name('profil.edit.freelancer_information');
    Route::get('/supprimer-le-cv/{str}', [ProfileController::class, 'delete_cv'])->name('delete.cv');
    Route::get('/acheter-un-pack/{plan?}', [SubscriptionController::class, 'create'])->name('subscription.create');
     // Message
    Route::get('/messagerie', [MessageController::class, 'index_freelancer'])->name('message.index.freelancer');
    Route::get('/messagerie/{mission}', [MessageController::class, 'show'])->name('message.show.freelancer');
    Route::post('/messagerie', [MessageController::class, 'store_freelancer'])->name('message.store.freelancer');


     
     // online gateway 
    Route::get('/paiement-réussi', [SubscriptionController::class, 'success'])->name('checkout.success');
    Route::get('/facture/{id?}', [SubscriptionController::class, 'invoice'])->name('invoice');
    Route::post('/activation-plan', [SubscriptionController::class, 'ipn'])->name('ipn');
     // cash gateway 
    Route::get('/code-de-validation', [SubscriptionController::class, 'cash_code'])->name('cash.code');
    Route::post('/code-de-validation', [SubscriptionController::class, 'cash_code_validation'])->name('cash.code.validation');
  
    

});




require __DIR__.'/auth.php';