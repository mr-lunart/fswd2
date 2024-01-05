<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_assets extends Model
{
    use HasFactory;
    protected $table = 'Product_assets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id', 'image'
    ];
}
