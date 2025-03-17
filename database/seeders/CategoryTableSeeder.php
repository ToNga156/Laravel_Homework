<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     DB::table('categories_table')->insert([
    //         [
    //             'name' => 'Fish',
    //             'description' => 'It is the fish',
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ],
    //     ]);
    // }
    public function run()
    {
        Product::factory()->count(10)->create(); // Tạo 10 sản phẩm giả
    }
}
