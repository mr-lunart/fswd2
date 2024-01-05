<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApiResources;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::pluck('name')->toArray();
        return response()->json([
            'data' => $categories,
            'message' => 'Fetch all category',
            'success' => true
        ],200);
    }

    public function product_category()
    {
        
        if (isset($_GET['order'])){
            if ($_GET['order'] == 'desc'){
                $list_category = Categories::category_product('DESC');
                return response()->json([
                    'data' => ApiResources::collection($list_category),
                    'message' => 'Fetch all product',
                    'success' => true
                ],200);
            }
            
            elseif ($_GET['order'] == 'asc'){
                $list_category = Categories::category_product('ASC');
                return response()->json([
                    'data' => ApiResources::collection($list_category),
                    'message' => 'Fetch all product',
                    'success' => true
                ],200);
            }

            else {
                $list_category = Categories::category_product('');
                return response()->json([
                    'data' => ApiResources::collection($list_category),
                    'message' => 'Fetch all product',
                    'success' => true
                ],200);
            }
        }
        else {
            return response()->json([
                'message' => 'params not found',
                'success' => false
            ],400);
        }
    }
}
