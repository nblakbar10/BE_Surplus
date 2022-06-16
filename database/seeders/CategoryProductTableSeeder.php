<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_product = [
            [   
                'product_id' => 1,
                'category_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 
            [   
                'product_id' => 2,
                'category_id' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 
            [   
                'product_id' => 3,
                'category_id' => 2,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 

        ];

        \DB::table('category_product')->insert($category_product); 
    }
}
