<?php

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\API\QuestionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/v1/post', function (Request $request) {
    return $request->post();
})->middleware('auth:sanctum');

// Route::prefix('v1')->controller(PostController::class)->group(function(){
    Route::prefix('v1')->controller(PostController::class)->group(function(){
Route::get('/post', 'index');
Route::post('/post', 'store');
Route::get('/post/{post}', 'show');
Route::put('/post/{post}', 'update');
Route::delete('/post/{post}', 'destroy');

// Route::apiResource('post', PostController::class);

});


Route::controller(AuthController::class)->group(function(){
Route::post('register', 'register');
Route::post('login', 'login');
});


Route::ApiResource('question', QuestionController::class);
Route::get('/attempt-quiz', function(){
    $question = Question::inRandomOrder()->first();

    return response()->json([
        'status'         => true,
        'randomQuestion' => $question
    ], 200);
});

// api-routes

// localhost:8000/api/question              |  get
// localhost:8000/api/question              |  post
// localhost:8000/api/question/{question}   |  update
// localhost:8000/api/question/{question}   |  delete

// localhost:8000/api/attempt-quiz          |  get
