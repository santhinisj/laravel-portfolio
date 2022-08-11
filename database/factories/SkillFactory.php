<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class SkillFactory extends Factory
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
            'title' => $this->faker->sentence,
            'url' => $this->faker->url,
            'percent' => $this->faker->randomDigit,
            'user_id' => User::all()->random(),
        ];
    }
}
