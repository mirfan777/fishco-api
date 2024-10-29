<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;

use App\Http\Controllers\FishController;
use App\Http\Controllers\DiseaseController;

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
Route::get('/getAllUser', function () {
    return UserResource::collection(User::all());
});

Route::get('/getUser/{id}', function($id){
    return new UserResource(User::find($id));
});

Route::post('/addUser', function(Request $request){

    $response = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'address' => $request->address,
        'phone_number' => $request->phone_number
    ]);

    return $response;

});

Route::delete('/deleteUser/{id}', function($id){
    $response = User::where('id', $id)->delete();

    return $response;
});


//Fish
Route::get('/fish', [FishController::class, 'getAllFish']);
Route::get('/fish/{id}', [FishController::class, 'getFishById']);
Route::post('/fish/create', [FishController::class, 'createFish']);
Route::post('/fish/update/{id}', [FishController::class, 'updateFish']);
Route::delete('/fish/delete/{id}', [FishController::class, 'deleteFish']);


//Medicine

Route::get('/getAllMedicine', function () {
    return MedicineResource::collection(Medicine::all());
});

Route::get('/getMedicine/{id}', function($id){
    return new MedicineResource(Medicine::find($id));
});

Route::post('/addMedicine', function(Request $request){

    $response = Medicine::create([
        'name' => $request->name,
        'description' => $request->description,
        'disease_id' => $request->disease_id,
        'fish_id' => $request->fish_id
    ]);

    return $response;

});

Route::put('/updateMedicine/{id}', function(Request $request, $id){
    $response = Medicine::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteMedicine/{id}', function($id){
    $response = Medicine::where('id', $id)->delete();

    return $response;
});


//Disease

Route::get('/disease', [DiseaseController::class, 'getAllDisease']);

Route::get('/disease/{id}', [DiseaseController::class, 'getDiseaseById']);

Route::post('/addDisease', function(Request $request){

    $response = Disease::create([
        'name' => $request->name,
        'description' => $request->description,
        'symptoms' => $request->symptoms,
        'picture' => $request->picture
    ]);

    return $response;

});

Route::put('/updateDisease/{id}', function(Request $request, $id){
    $response = Disease::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteDisease/{id}', function($id){
    $response = Disease::where('id', $id)->delete();

    return $response;
});


//Article

Route::get('/getAllArticle', function () {
    return ArticleResource::collection(Article::all());
});

Route::get('/getArticle/{id}', function($id){
    return new ArticleResource(Article::find($id));
});

Route::post('/addArticle', function(Request $request){

    $response = Article::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'body' => $request->body,
        'user_id' => $request->user_id,
        'comment_id' => $request->comment_id
    ]);

    return $response;

});

Route::put('/updateArticle/{id}', function(Request $request, $id){
    $response = Article::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteArticle/{id}', function($id){
    $response = Article::where('id', $id)->delete();

    return $response;
});


//Comment

Route::get('/getAllComment', function () {
    return CommentResource::collection(Comment::all());
});

Route::get('/getComment/{id}', function($id){
    return new CommentResource(Comment::find($id));
});

Route::post('/addComment', function(Request $request){

    $response = Comment::create([
        'user_id' => $request->user_id,
        'body' => $request->body,
        'article_id' => $request->article_id
    ]);

    return $response;

});

Route::put('/updateComment/{id}', function(Request $request, $id){
    $response = Comment::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteComment/{id}', function($id){
    $response = Comment::where('id', $id)->delete();

    return $response;
});


//Reply

Route::get('/getAllReply', function () {
    return RepliesResource::collection(Replies::all());
});

Route::get('/getReply/{id}', function($id){
    return new RepliesResource(Replies::find($id));
});

Route::post('/addReply', function(Request $request){

    $response = Replies::create([
        'comment_id' => $request->comment_id,
        'user_id' => $request->user_id,
        'body' => $request->body
    ]);

    return $response;

});

Route::put('/updateReply/{id}', function(Request $request, $id){
    $response = Replies::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteReply/{id}', function($id){
    $response = Replies::where('id', $id)->delete();

    return $response;
});



//Product

Route::get('/getAllProduct', function () {
    return ProductResource::collection(Products::all());
});

Route::get('/getProduct/{id}', function($id){
    return new ProductResource(Products::find($id));
});

Route::post('/addProduct', function(Request $request){

    $response = Products::create([
        'affiliate_id' => $request->affiliate_id,
        'name' => $request->name,
        'category' => $request->category,
        'description' => $request->description,
        'price' => $request->price,
        'link' => $request->link
    ]);

    return $response;

});

Route::put('/updateProduct/{id}', function(Request $request, $id){
    $response = Products::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteProduct/{id}', function($id){
    $response = Products::where('id', $id)->delete();

    return $response;
});


//Affiliate

Route::get('/getAllAffiliate', function () {
    return AffiliateResource::collection(Affiliate::all());
});

Route::get('/getAffiliate/{id}', function($id){
    return new AffiliateResource(Affiliate::find($id));
});

Route::post('/addAffiliate', function(Request $request){

    $response = Affiliate::create([
        'name' => $request->name,
        'address' => $request->address,
        'phone_number' => $request->phone_number,
        'link' => $request->link
    ]);

    return $response;

});

Route::put('/updateAffiliate/{id}', function(Request $request, $id){
    $response = Affiliate::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteAffiliate/{id}', function($id){
    $response = Affiliate::where('id', $id)->delete();

    return $response;
});


//Fish Image

Route::get('/getAllFishImage', function () {
    return FishImageResource::collection(FishImage::all());
});

Route::get('/getFishImage/{id}', function($id){
    return new FishImageResource(FishImage::find($id));
});

Route::post('/addFishImage', function(Request $request){

    $response = FishImage::create([
        'fish_id' => $request->fish_id,
        'image' => $request->image,
        'status' => $request->status,
        'disease_id' => $request->disease_id
    ]);

    return $response;

});

Route::put('/updateFishImage/{id}', function(Request $request, $id){
    $response = FishImage::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteFishImage/{id}', function($id){
    $response = FishImage::where('id', $id)->delete();

    return $response;
});


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