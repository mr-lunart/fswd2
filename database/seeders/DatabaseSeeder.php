<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $category = [
                'Elektronik',
                'Fashion Pria',
                'Fashion Wanita',
                'Handphone & Tablet',
                'Olahraga'
        ];

        foreach($category as $tag){
            
            \App\Models\Categories::factory()->create(['name' => $tag]);

        }
        
        $products = [
            [
                'category_id'=>1,
                'name'=>'Logitech H111 Headset Stereo Single Jack 3.5mm',
                'slug'=>'logitech-h111-headset-stereo-single-jack-3-5mm',
                'price'=>80000,
            ],
            [
                'category_id'=>1,
                'name'=>'Philips Rice Cooker - Inner Pot 2L Bakuhanseki - HD3110/33',
                'slug'=>'philips-rice-cooker -inner-pot-2l-bakuhanseki-hd3110-33',
                'price'=>249000,
            ],
            [
                'category_id'=>4,
                'name'=>'Iphone 12 64Gb/128Gb/256Gb Garansi Resmi IBOX/TAM - Hitam, 64Gb',
                'slug'=>'iphone-12-64gb-128gb-256gb-garansi-resmi-ibox-tam-hitam-64gb',
                'price'=>11340000,
            ],
            [
                'category_id'=>5,
                'name'=>'Papan alat bantu Push Up Rack Board Fitness Workout Gym',
                'slug'=>'papan-alat-bantu-push-up-rack-board-fitness-workout-gym',
                'price'=>90000,
            ],
            [
                'category_id'=>2,
                'name'=>'Jim Joker - Sandal Slide Kulit Pria Bold 2S Hitam - Hitam',
                'slug'=>'jim-joker-sandal-slide-kulit-pria-bold-2s-hitam-hitam',
                'price'=>305000,
            ],
            
        ];

        foreach($products as $product){
            
            \App\Models\Products::factory()->create(
                [
                    'category_id'=>$product['category_id'],
                    'name'=>$product['name'],
                    'slug'=>$product['slug'],
                    'price'=>$product['price']
                ]
            );

        }

        $product_asset = [
            [
                'product_id'=>1,
                'image'=>'logitech-h111.png',
            ],
            [
                'product_id'=>1,
                'image'=>'logitech-h111-headset-stereo-single-jack-3-5mm.png',
            ],
            [
                'product_id'=>2,
                'image'=>'philips-rice-cooker-inner-pot-2l-bakuhanseki-hd3110-33.png',
            ],
            [
                'product_id'=>2,
                'image'=>'philips.png',
            ],
            [
                'product_id'=>2,
                'image'=>'philips-rice-cooker.png',
            ],
            [
                'product_id'=>3,
                'image'=>'iphone-12-64gb-128gb-256gb.png',
            ],
            [
                'product_id'=>4,
                'image'=>'papan-alat-bantu-push-up.png',
            ],
            [
                'product_id'=>5,
                'image'=>'jim-joker-sandal-slide-kulit-pria-bold-2s-hitam-hitam.png',
            ],
        ];

        foreach($product_asset as $asset){
            
            \App\Models\Product_assets::factory()->create(
                [
                    'product_id'=>$asset['product_id'],
                    'image'=>$asset['image'],
                ]
            );

        }
      
        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'test@example.com',
            'password'=>Hash::make('12345')
        ]);
    }
}
