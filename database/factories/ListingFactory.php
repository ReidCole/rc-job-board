<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition()
  {
    $faker = fake();
    return [
      'owner_user_id' => 1,
      'title' => $faker->randomElement(['Junior', 'Entry-Level', 'Mid-Level', 'Senior', 'Lead', 'Assistant']) . ' ' . ucfirst($faker->word()) . ' ' . $faker->randomElement(['Developer', 'Programmer', 'Engineer']),
      'company' => $faker->company(),
      'description' => $faker->paragraph(5),
      'email' => $faker->email(),
      'logo' => null,
      'location_type' => $faker->randomElement(['on-site', 'remote', 'hybrid']),
      'location' => $faker->country(),
    ];
  }
}
