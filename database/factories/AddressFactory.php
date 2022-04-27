<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Address;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    protected $model = Address::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $prof = $this->faker->boolean();
        

        return [
            'professionnal' => $prof,
            'civility' => !$prof?$this->faker->boolean()?'Mme':'M':null,
            'name' => !$prof?$this->faker->name():null,
            'firstname' => !$prof?$this->faker->name():null,
            'company' => $prof?$this->faker->company():null,
            'address' => $this->faker->streetaddress(),
            'addressbis' => $this->faker->boolean()?$this->faker->secondaryaddress():null,
            'bp' => $this->faker->boolean()?$this->faker->numberBetween(100, 900):null,
            'postal' => $this->faker->numberBetween(10000, 90000), 
            'city' => $this->faker->city(), 
            'country_id' => mt_rand(1,4), 
            'phone' => $this->faker->numberBetween(100000000, 9000000000), 
        
        ];
    }
}
