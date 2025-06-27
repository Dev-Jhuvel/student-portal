<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        // $course = 'BS' . strtoupper($this->faker->randomLetter() . $this->faker->randomLetter());

        $gender = $this->faker->randomElement(['Male', 'Female']);
        $semester = $this->faker->randomElement(['First Semester', 'Second Semester', 'Summer']);
        $suffix = $this->faker->randomElement(['','Sr', 'Jr', 'III', 'IV', 'V']);
        return [

            'user_id' => User::factory(),
            'course_id' => Course::factory(),
            'firstName' => $this->faker->firstName($gender),
            'lastName' => $this->faker->lastName(),
            'middleName' => $this->faker->lastName(),
            'suffix' => $suffix,
            'birthday' => $this->faker->dateTimeBetween('-25 years', '-20 years', null)->format('Y-m-d'),
            'gender' => $gender,
            'province' => $this->faker->city(),
            'city' => $this->faker->city(),
            'email' => fake()->unique()->safeEmail(),
            'contactNumber' => $this->faker->phoneNumber(),
            'barangay' => $this->faker->streetAddress(),
            'street' => $this->faker->streetAddress(),
            'HouseNumber' => $this->faker->numberBetween(0, 300),
            'year' => $this->faker->numberBetween(1, 5),
            'semester' => $semester,
            'schoolYear' => '2025-2026',
        ];
    }
}
