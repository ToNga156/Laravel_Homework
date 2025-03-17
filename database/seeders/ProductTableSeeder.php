<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $faker = Faker::create();
        for($i = 0; $i < 100; $i++){

            DB::table('products_table')->insert([
                [
                    'name' => $faker->word,
                    'price' => $faker->randomFloat(2, 10, 500),
                    'image' =>  $faker->imageUrl(200, 200, 'products'),
                    'cate_id' => 2,
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                
            ]);
        }
    }
}
