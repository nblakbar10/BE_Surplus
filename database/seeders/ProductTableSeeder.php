<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [   
                'name' => 'Avanza',
                'description' => 'Mobil keluarga small 1500cc',
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 
            [   
                'name' => 'Innova',
                'description' => 'Mobil keluarga medium 2000cc',
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [   
                'name' => 'Rush',
                'description' => 'Mobil SUV small 1500cc',
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 

        ];
        \DB::table('product')->insert($product); 
    }
}
