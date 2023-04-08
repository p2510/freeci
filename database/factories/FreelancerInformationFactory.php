<?php

namespace Database\Factories;

use App\Http\Utils\Listing;
use App\Models\FreelancerInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FreelanceInformation>
 */
class FreelancerInformationFactory extends Factory
{
    protected $model =FreelancerInformation::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $getListDomain=Listing::domain();
        $getSkills=fake()->randomElements($getListDomain,4);
        return [
            'tjm' => fake()->randomNumber(5,true),
            'job'=>fake()->words(2 ,true),
            'domain'=>fake()->randomElement($getListDomain),
            'description'=>fake()->paragraphs(4,true),
            'skills'=>implode(',',$getSkills),
            'cv'=>null
        ];
    }
}