<?php

use App\Exports\UsersExport;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ExportExcelController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/export/excel', [ExportExcelController::class, 'export']);
// Route::get('/excel', [UsersExport::class , 'exportdata']);

// questions routes
// Route::get('/question/create', [QuestionController::class , 'create'])->name('question.create');
// Route::post('/question/store', [QuestionController::class , 'store'])->name('question.store');
// Route::get('/question/index', [QuestionController::class , 'index'])->name('question.index');

Route::resource('question', QuestionController::class);


// Quiz

Route::get('quiz', function(){
    return view('quiz');
});
Route::get('attempt-quiz', [QuizController::class, 'index'])->name('quiz.attempt');

