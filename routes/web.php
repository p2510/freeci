<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FreelancerController;
use App\Http\Controllers\StaticPageController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\Admin\AdminCodeController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\ApplicantMissionController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminStatistiqueController;

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



/* ROUTING FOR RECRUTOR */

    //routing  for missions
    Route::prefix('/mission')->group(function () {
        Route::get('/', [MissionController::class, 'index'])->name('mission.index');
        Route::post('/recherche', [MissionController::class, 'search'])->name('mission.search');
        Route::get('/plus-récents', [MissionController::class, 'recent'])->name('mission.recent');
        Route::get('/en-vedette', [MissionController::class, 'featured'])->name('mission.featured');
        Route::get('/publier', [MissionController::class, 'create'])->name('mission.create');
        Route::post('/publier', [MissionController::class, 'store'])->name('mission.store');
    });
    //routing for review
    Route::post('ajouter-commentaire/{user}', [ReviewController::class, 'store'])->name('review.store');

    // routing follow  missions and messages 
    Route::get('/entrez-code-mission', [FollowController::class, 'create'])->name('follow.search');
    Route::post('/entrez-code-mission', [FollowController::class, 'store'])->name('follow.store');
    Route::patch('/accepter-mission/{mission}', [FollowController::class, 'accepted'])->name('follow.accepted');
    Route::prefix('/messagerie-mission')->group(function () {
        Route::get('/{mission}', [MessageController::class, 'index_recrutor'])->name('message.index.recrutor');
        Route::post('/', [MessageController::class, 'store_recrutor'])->name('message.store.recrutor');
    });
   
   
/*ROUTING FOR USER */

    Route::get('/', [HomeController::class, '__invoke'])->name('home');
    Route::post('/recherche', [HomeController::class, 'search'])->name('search');
    //routing static page
    Route::get('/tarification', [StaticPageController::class, 'pricing'])->name('static.pricing');
    Route::get('/faq-recruteur', [StaticPageController::class, 'faq_recrutor'])->name('static.faq.recrutor');
    Route::get('/faq-freelancer', [StaticPageController::class, 'faq_freelancer'])->name('static.faq.freelancer');
    Route::get('/support', [StaticPageController::class, 'support'])->name('static.support');
    Route::post('/support', [StaticPageController::class, 'support_store'])->name('static.support.store');
    //routing freelancer 
    Route::prefix('freelancer')->group(function () {
        Route::get('/', [FreelancerController::class, 'index'])->name('freelancer.index');
        Route::get('/{user}', [FreelancerController::class, 'show'])->name('freelancer.show');
    });
    Route::get('/en-ligne', [FreelancerController::class, 'onlineFreelancer'])->name('freelancer.online');
    Route::get('/les-nouveaux', [FreelancerController::class, 'newFreelancer'])->name('freelancer.new');

    //routing categories
    Route::get('/catégorie/{category}', [CategoryController::class, '__invoke'])->name('category.index');
    //routing missions
    Route::prefix('/mission')->group(function () {
        Route::get('/', [MissionController::class, 'index'])->name('mission.index');
        Route::post('/recherche', [MissionController::class, 'search'])->name('mission.search');
        Route::get('/plus-récents', [MissionController::class, 'recent'])->name('mission.recent');
        Route::get('/en-vedette', [MissionController::class, 'featured'])->name('mission.featured');
        Route::get('/publier', [MissionController::class, 'create'])->name('mission.create');
        Route::post('/publier', [MissionController::class, 'store'])->name('mission.store');
    });


/*ROUTING FOR FREELANCERS */

    Route::middleware('auth')->group(function () {
        //routing for  profil  information
        Route::get('/dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::patch('/mettre-les-informations-à-jour', [ProfileController::class, 'edit_freelancer_information'])->name('profil.edit.freelancer_information');
        Route::get('/supprimer-le-cv/{str}', [ProfileController::class, 'delete_cv'])->name('delete.cv');
        Route::get('/acheter-un-pack/{plan?}', [SubscriptionController::class, 'create'])->name('subscription.create');
        // routing for missions
        Route::prefix('/mission')->group(function () {
            Route::get('/mes-missions', [ApplicantMissionController::class, 'index'])->name('applicant.mission.index');
            Route::post('/postuler/{mission}', [ApplicantMissionController::class, 'store'])->name('applicant.mission.store');
            Route::patch('/modifier', [ApplicantMissionController::class, 'update'])->name('applicant.mission.update');
            Route::get('/{mission}', [MissionController::class, 'show'])->name('mission.show');
            Route::delete('/supprimer/{id}', [ApplicantMissionController::class, 'destroy'])->name('applicant.mission.delete');
        });
        
        //routing for Message
        Route::get('/messagerie', [MessageController::class, 'index_freelancer'])->name('message.index.freelancer');
        Route::get('/messagerie/{mission}', [MessageController::class, 'show'])->name('message.show.freelancer');
        Route::post('/messagerie', [MessageController::class, 'store_freelancer'])->name('message.store.freelancer');

        //routing for review 
        Route::get('/commentaire', [ReviewController::class, 'index'])->name('review.index');
    
        // online gateway 
        Route::get('/paiement-réussi', [SubscriptionController::class, 'success'])->name('checkout.success');
        Route::get('/facture/{id?}', [SubscriptionController::class, 'invoice'])->name('invoice');
        Route::post('/activation-plan', [SubscriptionController::class, 'ipn'])->name('ipn');
        // cash gateway 
        Route::get('/code-de-validation', [SubscriptionController::class, 'cash_code'])->name('cash.code');
        Route::post('/code-de-validation', [SubscriptionController::class, 'cash_code_validation'])->name('cash.code.validation');
    
        // routing nofications 
        Route::get('/notification/{id}', [NotificationController::class, 'readNotification'])->name('notifcation.read');
        Route::get('/notification', [NotificationController::class, 'readAllNotification'])->name('notifcation.readall');

        
    });

/*ROUTING FOR ADMIN*/



    Route::middleware(['auth','is.admin'])->group(function () {
        Route::prefix('/admin')->group(function () {
            Route::get('/', [AdminHomeController::class, '__invoke'])->name('admin.home');
            // information 
            Route::get('/statistique', [AdminStatistiqueController::class, '__invoke'])->name('admin.statistique');
            // gestion
            Route::get('/liste-code', [AdminCodeController::class, 'index'])->name('admin.code.index');
            Route::get('/nouveau-code', [AdminCodeController::class, 'create'])->name('admin.code.create');
            Route::post('/nouveau-code', [AdminCodeController::class, 'store'])->name('admin.code.store');
            Route::get('/modifier-code/{code}', [AdminCodeController::class, 'edit'])->name('admin.code.edit');
            Route::patch('/modifier-code/{code}', [AdminCodeController::class, 'update'])->name('admin.code.update');
            Route::get('/liste-catégorie', [AdminCategoryController::class, 'index'])->name('admin.category.index');
            Route::get('/catégorie', [AdminCategoryController::class, 'create'])->name('admin.category.create');
            Route::post('/catégorie', [AdminCategoryController::class, 'store'])->name('admin.category.store');
            Route::get('/modifier-catégorie/{category}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit');
            Route::patch('/modifier-catégorie/{category}', [AdminCategoryController::class, 'update'])->name('admin.category.update');
        });
    });


require __DIR__.'/auth.php';