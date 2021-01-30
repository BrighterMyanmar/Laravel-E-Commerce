<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Route;
//1!Aahello

Route::post('/login',[ApiController::class,'login']);
Route::post('/register',[ApiController::class,'register']);

Route::get('cats',[ApiController::class,'cats']);
Route::get('subcats',[ApiController::class,'allsubcats']);
Route::get('subcat/{id}',[ApiController::class,'subcats']);
Route::get('tags',[ApiController::class,'tags']);
Route::get('tag/{id}',[ApiController::class,'productByTag']);
Route::get('products',[ApiController::class,'products']);
Route::get('pbc/{id}',[ApiController::class,'getProductByCategory']);
Route::get('pbs/{id}',[ApiController::class,'getProductBySubcat']);
Route::get('pbt/{id}',[ApiController::class,'getProductByTag']);


Route::group(['middleware'=>'jwt.auth'],function(){
    Route::get('me',[ApiController::class,'me']);
    Route::post('/order',[ApiController::class,'setOrder']);
    Route::get('/myorder',[ApiController::class,'myOrder']);
    Route::get('/orderItems/{id}',[ApiController::class,'myOrderItems']);
});
