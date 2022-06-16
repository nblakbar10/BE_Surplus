<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ImageTableSeeder::class,
            ProductImageTableSeeder::class,
            ProductTableSeeder::class,
            CategoryTableSeeder::class,
            CategoryProductTableSeeder::class,
          ]);

        // \App\Models\User::factory(10)->create();
    }
}
