<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker::create();
        $image = [
            [   
                'name' => 'gambar1',
                'file' => $faker->imageUrl(640,480, null, false),
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 
            [   
                'name' => 'gambar2',
                'file' => $faker->imageUrl(640,480, null, false),
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [   
                'name' => 'gambar3',
                'file' => $faker->imageUrl(640,480, null, false),
                'enable' => 1,
                'created_at' => new \DateTime,
                'updated_at' => null,
            ], 

        ];
        \DB::table('image')->insert($image); 
    }
}
