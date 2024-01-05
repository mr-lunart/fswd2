<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('/login', [AuthController::class, 'login']);
#categories
Route::get('category', [CategoriesController::class,'index']);
#Categories dan urutkan dari jumlah product terbanyak ke sedikit.
Route::get('products', [CategoriesController::class,'product_category']);
#Products (beserta assetnya)
Route::get('products/assets', [ProductsController::class,'index']);
#Products dengan urutan dari harga termahal ke termurah
Route::get('products/assets/order', [ProductsController::class,'price_order']);

Route::middleware('auth:sanctum')->group(function () {
    #endpoint untuk tambah asset
    Route::post('products/assets/upload',[ProductsController::class,'upload']);
    #endpoint untuk hapus asset
    Route::post('products/assets/delete',[ProductsController::class,'delete']);
    #endpoint untuk edit product
    Route::post('products/edit',[ProductsController::class,'editProduct']);
    #endpoint untuk hapus product beserta assetnya.
    Route::post('products/delete',[ProductsController::class,'deleteProduct']);
    #endpoint untuk menambahkan data product berserta upload multiple image (ke table product_assets).
    Route::post('products/insert',[ProductsController::class,'insertProduct']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



