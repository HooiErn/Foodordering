<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this -> faker -> name(),
            'password' => '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8'
        ];
    }
}