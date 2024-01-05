<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResources;
use App\Models\Product_assets;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class ProductsController extends Controller
{
    public function index(){
        $product = DB::table('Products')
            ->join('Product_assets', 'Products.id', '=', 'Product_assets.product_id')
            ->select('Products.name','Products.slug','Products.slug','Products.price','Product_assets.image')
            ->get();

        return response()->json([
            'data' => $product,
            'message' => 'Fetch all product',
            'success' => true
        ],200);}

    public function price_order(){
        $product = DB::table('Products')
            ->select('name','slug','price')
            ->orderBy('price', 'desc')
            ->get();
            
        return response()->json([
            'data' => $product,
            'message' => 'Fetch all product',
            'success' => true
        ],200);}

    public function upload(Request $request){
        
        $produk_id = $request->input('product_id');
        $request->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $picture){
                $fileName = $picture->getClientOriginalName();
                Product_assets::create([
                    'product_id'=>$produk_id,
                    'image'=>$fileName
                ]);
                $picture->storeAs('images/',$fileName,'public');}

            return response()->json([
                'data' => [],
                'message' => 'picture has been uploaded',
                'success' => true
            ],200 );}

        return response()->json([
            'data' => [],
            'message' => 'format file unacceptable',
            'success' => true
        ],400 );
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $assets = Product_assets::find($id);
        if (isset($assets)){
            $assets->delete();
            return response()->json([
                'data' => [],
                'message' => 'product has been delete',
                'success' => true
            ],200);}   
        else {
            return response()->json([
                'data' => [],
                'message' => 'product id not found',
                'success' => false
            ],404);}       
        
    }

    public function insertProduct(Request $request){
        

        $request->validate([
            'name'=>'required',
            'category_id'=>'required',
            'slug'=>'required',
            'price'=>'required',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $product = new Products();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->slug = $request->input('slug');
        $product->price = $request->input('price');
        $product->save();

        if ($request->hasFile('images')) {
            foreach($request->file('images') as $picture){
                $fileName = $picture->getClientOriginalName();
                Product_assets::create([
                    'product_id'=>$product->id,
                    'image'=>$fileName
                ]);
                $picture->storeAs('images/',$fileName,'public');}

            return response()->json([
                'data' => [],
                'message' => 'picture has been uploaded',
                'success' => true
            ],200 );}

        return response()->json([
            'data' => [],
            'message' => 'format file unacceptable',
            'success' => true
        ],400 );
    }

    public function editProduct(Request $request){
        $id = $request->input('id');
        $product = Products::find($id);

        $request->validate([
            'name'=>'required',
            'slug'=>'required',
            'price'=>'required',
        ]);

        if (isset($product)){
            $product->name = $request->input('name');
            $product->slug = $request->input('slug');
            $product->price = $request->input('price');
            $product->save();
            
            return response()->json([
                'data' => [],
                'message' => 'change has been saved',
                'success' => true
            ],200);}

        else {
            return response()->json([
                'data' => [],
                'message' => 'product id not found',
                'success' => false
            ],404);}        
    }

    public function deleteProduct(Request $request){
        $id = $request->input('id');
        $product = Products::find($id);
        $assets = Product_assets::where('product_id','=',$id);

        if (isset($product) && isset($assets)){
            $product->delete();
            $assets->delete();
            return response()->json([
                'data' => [],
                'message' => 'product has been delete',
                'success' => true
            ],200);}
        else {
            return response()->json([
                'data' => [],
                'message' => 'product id not found',
                'success' => false
            ],404);}        
    }
}
