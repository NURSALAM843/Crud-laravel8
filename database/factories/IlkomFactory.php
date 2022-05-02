<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

class IlkomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nim' => $this->faker->nik(),
            'nama' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'angkatan' =>$this->faker->dateTimeThisYear()

        ];
    }
}
