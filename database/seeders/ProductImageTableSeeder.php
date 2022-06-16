<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
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
        $product_image = [
            [   
                'product_id' => 1,
                'image_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 
            [   
                'product_id' => 2,
                'image_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 
            [   
                'product_id' => 3,
                'image_id' => 2,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 

        ];

        \DB::table('product_image')->insert($product_image); 
    }
}
