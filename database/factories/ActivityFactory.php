<?php

namespace Database\Factories;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Factories\Factory;

class ActivityFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'parent_id' => $this->faker->randomElement([null, Activity::inRandomOrder()->first()?->id]),
        ];
    }
}
