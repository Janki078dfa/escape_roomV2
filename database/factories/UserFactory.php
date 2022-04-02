<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'dni' => $this->faker->numerify('#########'),
            'phone' => $this->faker->numerify('#########'),
            'email' => $this->faker->safeEmail(),
            'password' => $this->faker->password(6, 10),
        ];
    }
}
