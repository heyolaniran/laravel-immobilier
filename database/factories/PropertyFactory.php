<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rooms = $this->faker->numberBetween(2 , 6) ; 
        return [
            'titre' => $this->faker->sentence(3 , true) , 
            'description' => $this->faker->sentences(6, true), 
            'surface' =>$this->faker->numberBetween(20 , 100) , 
            'rooms' => $rooms ,
            'bedrooms' => $this->faker->numberBetween(1, $rooms),
            'floor' => $this->faker->numberBetween(2, 4),
            'price' => $this->faker->numberBetween(100000 , 1000000) , 
            'city' => $this->faker->city , 
            'address' => $this->faker->address , 
            'sold' => false 
        ];
    }

     /**
     * Indicate that the model's email address should be unverified.
     */
    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
