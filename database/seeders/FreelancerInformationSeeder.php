<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FreelancerInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FreelancerInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FreelancerInformation::factory()->count(1)->create();
    }
}