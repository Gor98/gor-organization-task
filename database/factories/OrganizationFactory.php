<?php

namespace Database\Factories;

use App\Models\Activity;
use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrganizationFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'phone_numbers' => json_encode([
                $this->faker->phoneNumber,
                $this->faker->phoneNumber,
                $this->faker->phoneNumber,
            ]),
            'building_id' => Building::factory(),
        ];
    }
}
