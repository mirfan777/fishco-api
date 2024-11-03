<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\FishController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AquariumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\FishImageController;

use App\Http\Resources\AffiliateResource;
use App\Http\Resources\ArticleResource;
use App\Http\Resources\CommentResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Resources\DiseaseResource;
use App\Http\Resources\FishResource;
use App\Http\Resources\MedicineResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\RepliesResource;
use App\Http\Resources\UserResource;
use App\Http\Resources\FishImageResource;

use App\Models\User;
use App\Models\Fish;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Replies;
use App\Models\Affiliate;
use App\Models\Disease;
use App\Models\Medicine;
use App\Models\Products;
use App\Models\FishImage;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

//User
// Route::get('/getAllUser', function () {
//     return UserResource::collection(User::all());
// });

// Route::get('/getUser/{id}', function($id){
//     return new UserResource(User::find($id));
// });

// Route::post('/addUser', function(Request $request){

//     $response = User::create([
//         'name' => $request->name,
//         'email' => $request->email,
//         'password' => bcrypt($request->password),
//         'address' => $request->address,
//         'phone_number' => $request->phone_number
//     ]);

//     return $response;

// });

// Route::delete('/deleteUser/{id}', function($id){
//     $response = User::where('id', $id)->delete();

//     return $response;
// });


//Fish
Route::get('/fish', [FishController::class, 'getAllFish']);
Route::get('/fish/{id}', [FishController::class, 'getFishById']);
Route::post('/fish/create', [FishController::class, 'createFish']);
Route::post('/fish/update/{id}', [FishController::class, 'updateFish']);
Route::delete('/fish/delete/{id}', [FishController::class, 'deleteFish']);
Route::post('/fish/{id}/upload', [FishController::class, 'uploadFishImage']);
Route::delete('/fish/{id}/delete-image/{img}', [FishController::class, 'deleteFishImage']);


//Medicine
Route::get('/medicine', [MedicineController::class, 'getAllMedicine']);
Route::get('/medicine/{id}', [MedicineController::class, 'getMedicineById']);
Route::post('/medicine/create', [MedicineController::class, 'createMedicine']);
Route::post('/medicine/update/{id}', [MedicineController::class, 'updateMedicine']);
Route::delete('/medicine/delete/{id}', [MedicineController::class, 'deleteMedicine']);
Route::get('/dropdown-data', [MedicineController::class, 'getDropdownData']);


//Disease
Route::get('/disease', [DiseaseController::class, 'getAllDisease']);
Route::get('/disease/{id}', [DiseaseController::class, 'getDiseaseById']);
Route::post('/disease/create', [DiseaseController::class, 'createDisease']);
Route::post('/disease/update/{id}', [DiseaseController::class, 'updateDisease']);
Route::delete('/disease/delete/{id}', [DiseaseController::class, 'deleteDisease']);

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


//Affiliate
Route::get('/affiliate', [AffiliateController::class, 'getAllAffiliate']);
Route::get('/affiliate/{id}', [AffiliateController::class, 'getAffiliateById']);
Route::post('/affiliate/create', [AffiliateController::class, 'createAffiliate']);
Route::post('/affiliate/update/{id}', [AffiliateController::class, 'updateAffiliate']);
Route::delete('/affiliate/delete/{id}', [AffiliateController::class, 'deleteAffiliate']);


//Fish Image
Route::get('/fishimage',[FishImageController::class, 'getAllFishImage']);
Route::get('/fishimage/{id}', [FishImageController::class, 'getFishImage']);
Route::post('/fishimage/create', [FishImageController::class, 'createFishImage']);
Route::post('/fishimage/update/{id}', [FishImageController::class, 'updateFishImage']);
Route::delete('/fishimage/delete/{id}', [FishImageController::class, 'deleteFishImage']);

//Dropdown
Route::get('/diseases', [DiseaseController::class, 'getAllDiseases']);
Route::get('/fishes', [FishController::class, 'getAllFishes']);

//Login
Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

Route::middleware('web')->post('/login', [AuthenticatedSessionController::class, 'store'])
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