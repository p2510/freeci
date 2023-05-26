<?php

namespace Database\Factories;

use App\Http\Utils\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mission>
 */
class MissionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $getListDomain=Listing::domain();

        $getTags=[fake()->word(),fake()->word(),fake()->word(),fake()->word()];
        return [
            'title' => fake()->words(3, true),
            'type_mission'=>fake()->randomElement([1,2]),
            'type_budget'=>fake()->randomElement([1,2]),
            'category'=>fake()->randomElement($getListDomain),
            'budget_min'=>fake()->numberBetween(10000,100000),
            'budget_max'=>fake()->numberBetween(100000,4000000000),
            'tags' => implode(',',$getTags),
            'description' => fake()->text(),
            'code' => fake()->text(),
            'phone' => fake()->phoneNumber(),
        ];
    }
}