<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shopp;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shopp>
 */
class ShoppFactory extends Factory
{
    protected $model = Shopp::class;
    /**
     * Define the model's default state.
     * 
     * 
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2) ,
            'address' => $this->faker->streetaddress(),
            'holder'  => strtoupper($this->faker->sentence(3)),
            'email'  => $this->faker->email(),
            'bit'  => strtoupper(Str::random(8)),
            'iban' => $this->faker->iban(),
            'bank' => $this->faker->sentence(2),
            'bank_address'  => $this->faker->address(),
            'phone'  => $this->faker->phoneNumber(),
            'facebook'  => $this->faker->url(),
            'home' => $this->faker->sentence(3),
            'home_infos'  => $this->faker->text(),
            'home_shipping'  => $this->faker->text(),
        
        ];
    }
}
