<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = 'Bachelor of Science in ' . ucwords($this->faker->words(2, true));
        // $code = $this->faker->randomElement(['BSIT', 'BSCS', 'BSHM', 'BSAM', 'BSBM', 'BSCT', 'BSCC', 'BSHH', 'BSAA', 'BSBB']);
        $code = preg_replace('~[^A-Z]~', '', $name);
        return [
            'user_id' => User::factory(),
            'name'   => $name,
            'description'   => $this->faker->sentence('4', true),
            'code'   => $code,
            'program_year'   => $this->faker->numberBetween(1, 5),
        ];
    }
}
