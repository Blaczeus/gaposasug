<?php

namespace Database\Factories;

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
        $levels = ['ND', 'HND'];
        $departments = ['Computer Science', 'Business Administration', 'Mass Communication', 'Mechanical Engineering', 'Science Laboratory Tech'];

        return [
            'name' => $this->faker->unique()->words(3, true), // E.g. "Business Information Systems"
            'code' => strtoupper($this->faker->unique()->bothify('???###')), // E.g. "CSC101"
            'level' => $this->faker->randomElement($levels),
            'description' => $this->faker->sentence(12),
            'department' => $this->faker->randomElement($departments),
        ];
    }
}
