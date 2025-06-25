<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

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
            'user_id' => User::factory(),
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(2, true), // Generates a random job description
            'salary' => $this->faker->numberBetween(40000, 120000),
            'tags' => implode(', ', $this->faker->words(3)),
            'job_type' => $this->faker->randomElement(['full_time', 'part_time', 'contract']),
            'remote' => $this->faker->boolean(),
            'requirements' => $this->faker->sentence(3, true), // Generates a random requirements sentence
            'benefits' => $this->faker->sentence(2, true), // Generates a random benefits sentence
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zip_code' => $this->faker->postcode(),
            'contact_email' => $this->faker->safeEmail(),
            'contact_phone' => $this->faker->phoneNumber(),
            'company_name' => $this->faker->company(),
            'company_description' => $this->faker->paragraph(),
            'company_website' => $this->faker->url(),
            'company_logo' => $this->faker->imageUrl(100, 100, 'business', true, 'Company Logo'), // Generates a random image URL for the company logo
        ];
    }
}
