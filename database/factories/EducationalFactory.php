<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class EducationalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'credential' => $this->faker->word,
            'institution' => $this->faker->sentence,
            'year' => $this->faker->year,
            'user_id' => User::all()->random(),
        ];
    }
}
