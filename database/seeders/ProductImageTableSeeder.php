<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $$product_image = [
            [   
                'product_id' => 1,
                'image_id' => 1,
                
            ], 
            [   
                'product_id' => 2,
                'image_id' => 1,
                
            ], 
            [   
                'product_id' => 3,
                'image_id' => 2,
                
            ], 

        ];

        \DB::table('$product_image')->insert($$product_image); 
    }
}
