<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FeedbackController;



Route::post('/feedback', [FeedbackController::class,'store']);

Route::middleware('auth:sanctum')->group(function () {
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    });
});
