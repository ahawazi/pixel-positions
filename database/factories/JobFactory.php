<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::factory(),
            'title' => fake()->jobTitle(),
            'salary' => fake()->randomElement(['$50,000 USD', '$150,000 USD', '$90,000 USD']),
            'location' => fake()->randomElement(['Remote', 'Hybrid', 'On Site']),
            'schedule' => fake()->randomElement(['Full Time', 'Part Time']),
            'url' => fake()->url(),
            'featured' => fake()->boolean(),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($job) {
            $tags = Tag::factory()->count(3)->create();
            $job->tags()->sync($tags->pluck('id')->toArray());
        });
    }

}
