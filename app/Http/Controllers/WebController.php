<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    public function home() {
        $api1 = Http::get('http://localhost/laravel/fswd2/public/api/products?order=desc');
        $category_product = $api1->json();
        $api2 = Http::get('http://localhost/laravel/fswd2/public/api/products/assets');
        $product_assets = $api2->json();
        $api3 = Http::get('http://localhost/laravel/fswd2/public/api/products/assets/order');
        $product = $api3->json();
        return view('home',['category'=>$category_product,'products'=>$product,'pictureProduct'=>$product_assets]);
    }
    
}
