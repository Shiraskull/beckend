<?php

use App\Http\Controllers\LanguagesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
//soal nomor 3
Route::get('/', function () {
    return "Hello Go developers";
});
Route::get('/language', [LanguagesController::class, 'langue']);

//soal nomor 4
Route::get('/palindrome', [LanguagesController::class, 'palindrome']);


//soal nomor 5
Route::get('/languages', [LanguagesController::class, 'index']);
Route::post('/language', [LanguagesController::class, 'store']);


Route::any('/{any}', function(){
    return response()->json(["error" => "Method not allowed"], 405);
});

Route::get('/languages', [LanguagesController::class, 'index']);
Route::get('/palindrome', [LanguagesController::class, 'checkPalindrome']);
Route::post('/language', [LanguagesController::class, 'store']);
Route::get('/language/{id}', [LanguagesController::class, 'getLanguageById']);
Route::patch('/language/{id}', [LanguagesController::class, 'updateLanguage']);
Route::delete('/language/{id}', [LanguagesController::class, 'deleteLanguage']);
