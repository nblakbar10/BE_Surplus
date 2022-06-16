<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            [   
                'name' => 'Mobil Keluarga',
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 
            [   
                'name' => 'Mobil SUV',
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [   
                'name' => 'Mobil Hatchback',
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 

        ];
        \DB::table('category')->insert($category); 
    }
}
