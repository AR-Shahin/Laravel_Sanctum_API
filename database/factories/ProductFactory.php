<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(10),
            'category_id' => rand(1,5),
            'user_id' => 1,
            'price' => rand(150,200),
            'description' => $this->faker->text(100),
            'image' => 'https://via.placeholder.com/150x100'
        ];
    }
}
