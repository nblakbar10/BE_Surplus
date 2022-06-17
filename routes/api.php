<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CategoryProductController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductImageController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ImageController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('product', 'API/ProductController@index');
// Route::get('product/{id}', 'API/ProductController@show');
// Route::post('product', 'API/ProductController@store');
// Route::put('product/{id}', 'API/ProductController@update');
// Route::delete('product/{id}', 'API/ProductController@delete');


Route::get('product', [ProductController::class, 'index']);
Route::get('product/{id}', [ProductController::class, 'show']);
Route::post('product', [ProductController::class, 'store']);
Route::put('product/{id}', [ProductController::class, 'update']);
Route::delete('product/{id}', [ProductController::class, 'destroy']);

Route::get('category', [CategoryController::class, 'index']);
Route::get('category/{id}', [CategoryController::class, 'show']);
Route::post('category', [CategoryController::class, 'store']);
Route::put('category/{id}', [CategoryController::class, 'update']);
Route::delete('category/{id}', [CategoryController::class, 'destroy']);

Route::get('image', [ImageController::class, 'index']);
Route::get('image/{id}', [ImageController::class, 'show']);
Route::post('image', [ImageController::class, 'store']);
Route::put('image/{id}', [ImageController::class, 'update']);
Route::delete('image/{id}', [ImageController::class, 'destroy']);

Route::get('category_product', [CategoryProductController::class, 'index']);
Route::get('category_product_byProID/{product_id}', [CategoryProductController::class, 'showbyProductID']);
Route::get('category_product_byCatID/{category_id}', [CategoryProductController::class, 'showbyCategoryID']);
Route::post('category_product', [CategoryProductController::class, 'store']);
Route::put('category_product_byProID/{product_id}', [CategoryProductController::class, 'updatebyProductID']);
Route::put('category_product_byCatID/{category_id}', [CategoryProductController::class, 'updatebyCategoryID']);
Route::delete('delete_category_product_byCatID/{category_id}', [CategoryProductController::class, 'destroybyCategoryID']);
Route::delete('delete_category_product_byProID/{product_id}', [CategoryProductController::class, 'destroybyProductID']);

Route::get('product_image', [ProductImageController::class, 'index']);
Route::get('product_image_byImgID/{image_id}', [ProductImageController::class, 'showbyImageID']);
Route::get('product_image_byProID/{product_id}', [ProductImageController::class, 'showbyProductID']);
Route::post('product_image', [ProductImageController::class, 'store']);
Route::put('product_image_byImgID/{image_id}', [ProductImageController::class, 'updatebyImageID']);
Route::put('product_image_byProID/{product_id}', [ProductImageController::class, 'updatebyProductID']);
Route::delete('delete_product_image_byImgID/{image_id}', [ProductImageController::class, 'destroybyImageID']);
Route::delete('delete_product_image_byProID/{product_id}', [ProductImageController::class, 'destroybyProductID']);