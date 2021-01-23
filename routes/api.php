<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;


Route::post('/login',[ApiController::class,'login']);
Route::post('/register',[ApiController::class,'register']);
Route::get('cats',[ApiController::class,'cats']);
Route::get('subcat/{id}',[ApiController::class,'subcats']);


Route::group(['middleware'=>'jwt.auth'],function(){
    Route::get('me',[ApiController::class,'me']);
});
