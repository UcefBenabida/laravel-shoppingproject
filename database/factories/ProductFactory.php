<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'name' => $this->faker->name() ,
            'price' => mt_rand(100, 1000) ,
            'weight' => mt_rand(1,4)/1.8 ,
            'quantity' => 50 ,
            'active' => $this->faker->boolean(),
            'image' => strval(mt_rand(1,5).'.jpg') ,
            'description' => $this->faker->paragraph()
        ];
    }
}
