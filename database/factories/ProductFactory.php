<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 10, 500),
            'image' =>  $this->faker->imageUrl(200, 200, 'products'),
            'cate_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
