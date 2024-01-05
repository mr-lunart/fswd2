<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'Categories';
    protected $primaryKey = 'id';

    public static function category_product($order='')
    {
        $query = DB::select("SELECT Categories.id, Categories.name, IF(COUNT(Products.id) IS NULL,'0',COUNT(Products.id)) as total_products FROM Categories LEFT JOIN Products ON Categories.id = Products.category_id GROUP BY Categories.id,Categories.name ORDER BY total_products ".$order.";");
        return $query;
    }
}
