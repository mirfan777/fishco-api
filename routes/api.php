<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Fish;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Replies;
use App\Models\Affiliate;
use App\Models\Disease;
use App\Models\Medicine;
use App\Models\Products;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


//User


//Fish

Route::get('/getAllFish', function () {
    return Fish::all();
});

Route::get('/getFish/{id}', function($id){
    return Fish::find($id);
});

Route::post('/addFish', function(Request $request){

    $response = Fish::create([
        'name' => $request->name,
        'kingdom' => $request->kingdom,
        'phylum' => $request->phylum,
        'class' => $request->class,
        'order' => $request->order,
        'family' => $request->family,
        'genus' => $request->genus,
        'species' => $request->species,
        'colour' => $request->colour,
        'food_type' => $request->food_type,
        'food' => $request->food,
        'min_temperature' => $request->min_temperature,
        'max_temperature' => $request->max_temperature,
        'min_ph' => $request->min_ph,
        'max_ph' => $request->max_ph,
        'habitat' => $request->habitat
    ]);

    return $response;

});

Route::put('/updateFish/{id}', function(Request $request, $id){
    $response = Fish::where('id', $id)->update($request->all());

    return $response;
});

Route::delete('/deleteFish/{id}', function($id){
    $response = Fish::where('id', $id)->delete();

    return $response;
});


//Medicine

Route::get('/getAllMedicine', function () {
    return Medicine::all();
});

Route::get('/getMedicine/{id}', function($id){
    return Medicine::find($id);
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

Route::get('/getAllDisease', function () {
    return Disease::all();
});

Route::get('/getDisease/{id}', function($id){
    return Disease::find($id);
});

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
    return Article::all();
});

Route::get('/getArticle/{id}', function($id){
    return Article::find($id);
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
    return Comment::all();
});

Route::get('/getComment/{id}', function($id){
    return Comment::find($id);
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
    return Replies::all();
});

Route::get('/getReply/{id}', function($id){
    return Replies::find($id);
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
    return Products::all();
});

Route::get('/getProduct/{id}', function($id){
    return Products::find($id);
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
    return Affiliate::all();
});

Route::get('/getAffiliate/{id}', function($id){
    return Affiliate::find($id);
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