<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = ucwords($this->faker->words(2, true));
        $code = preg_replace('~[^A-Z]~', '', $name);
        $number = $this->faker->unique(true)->numberBetween(100, 200);
        return [
            'name' => $name,
            'code' => $code . '-'. strval($number),
            'description' => $this->faker->sentence(),
            'unit' => $this->faker->numberBetween(3, 4),
        ];
    }
}
