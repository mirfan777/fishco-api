<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\FishController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AquariumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FishImageController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProductRecommendationController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/profile', function (Request $request) {return $request->user();});
    Route::delete('/logout', [AuthenticatedSessionController::class, 'revokeToken']);

    // User
    Route::get('/users', [UserController::class, 'getAllUsers']);
    Route::get('/user', [UserController::class, 'getAllUser']);
    Route::get('/user/{id}', [UserController::class, 'getUserById']);
    Route::delete('/user/delete/{id}', [UserController::class, 'deleteUser']);
    Route::post('/user/update/{id}', [UserController::class, 'updateUser']);

    //Fish
    Route::get('/fish', [FishController::class, 'getAllFish']);
    Route::get('/fish/{id}', [FishController::class, 'getFishById']);
    Route::post('/fish/create', [FishController::class, 'createFish']);
    Route::post('/fish/update/{id}', [FishController::class, 'updateFish']);
    Route::delete('/fish/delete/{id}', [FishController::class, 'deleteFish']);
    Route::post('/fish/{id}/upload', [FishController::class, 'uploadFishImage']);
    Route::delete('/fish/{id}/delete-image/{img}', [FishController::class, 'deleteFishImage']);
    Route::get('/fishes', [FishController::class, 'getAllFishes']);

    //Disease
    Route::get('/disease', [DiseaseController::class, 'getAllDisease']);
    Route::get('/disease/{id}', [DiseaseController::class, 'getDiseaseById']);
    Route::post('/disease/create', [DiseaseController::class, 'createDisease']);
    Route::post('/disease/update/{id}', [DiseaseController::class, 'updateDisease']);
    Route::delete('/disease/delete/{id}', [DiseaseController::class, 'deleteDisease']);
    Route::get('/diseases', [DiseaseController::class, 'getAllDiseases']);

    //Aquarium
    Route::get('/aquarium', [AquariumController::class, 'getAllAquarium']);
    Route::get('/aquarium/{id}', [AquariumController::class, 'getAquarium']);
    Route::post('/aquarium/create', [AquariumController::class, 'createAquarium']);
    Route::post('/aquarium/update/{id}', [AquariumController::class, 'updateAquarium']);
    Route::delete('/aquarium/delete/{id}', [AquariumController::class, 'deleteAquarium']);


    //Article
    Route::get('/article', [ArticleController::class, 'getAllArticle']);
    Route::get('/article/{id}', [ArticleController::class, 'getArticleById']);
    Route::post('/article/create', [ArticleController::class, 'createArticle']);
    Route::post('/article/update/{id}', [ArticleController::class, 'updateArticle']);
    Route::delete('/article/delete/{id}', [ArticleController::class, 'deleteArticle']);
    Route::get('/articles', [ArticleController::class, 'getAllArticles']);


    //Comment
    Route::get('/comment', [CommentController::class, 'getAllComment']);
    Route::get('/comment/{id}', [CommentController::class, 'getComment']);
    Route::post('/comment/create', [CommentController::class, 'addComment']);
    Route::post('/comment/update/{id}', [CommentController::class, 'updateComment']);
    Route::delete('/comment/delete/{id}', [CommentController::class, 'deleteComment']);


    //Reply
    Route::get('/reply', [ReplyController::class, 'getAllReplies']);
    Route::get('/reply/{id}', [ReplyController::class, 'getRepliesById']);
    Route::post('/reply/create', [ReplyController::class, 'createReplies']);
    Route::post('/reply/update/{id}', [ReplyController::class, 'updateReplies']);
    Route::delete('/reply/delete/{id}', [ReplyController::class, 'deleteReplies']);


    //Product
    Route::get('/product', [ProductController::class, 'getAllProduct']);
    Route::get('/product/{id}', [ProductController::class, 'getProductById']);
    Route::post('/product/create', [ProductController::class, 'createProduct']);
    Route::post('/product/update/{id}', [ProductController::class, 'updateProduct']);
    Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct']);
    Route::get('/products', [ProductController::class, 'getAllProducts']);


    //Fish Image
    Route::get('/fishimage',[FishImageController::class, 'getAllFishImage']);
    Route::get('/fishimage/{id}', [FishImageController::class, 'getFishImage']);
    Route::post('/fishimage/create', [FishImageController::class, 'createFishImage']);
    Route::post('/fishimage/update/{id}', [FishImageController::class, 'updateFishImage']);
    Route::delete('/fishimage/delete/{id}', [FishImageController::class, 'deleteFishImage']);

    //Report
    Route::get('/report', [ReportController::class, 'getAllReport']);
    Route::get('/report/{id}', [ReportController::class, 'getReportById']);
    Route::post('/report/create', [ReportController::class, 'createReport']);
    Route::post('/report/update/{id}', [ReportController::class, 'updateReport']);
    Route::delete('/report/delete/{id}', [ReportController::class, 'deleteReport']);

    //Product Recommendation
    Route::get('/product-recommendation/{diseaseId}', [ProductRecommendationController::class, 'getRecommendationTreatmentProduct']);
});



Route::post('/requestToken', [AuthenticatedSessionController::class, 'requestToken'])->name('requestToken');
Route::post('/requestTokenAdmin', [AuthenticatedSessionController::class, 'requestTokenAdmin'])->name('requestTokenAdmin');

Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');

Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');