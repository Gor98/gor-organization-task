<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Building;
use App\Models\Organization;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $buildings = Building::factory(10)->create();

        $food = Activity::factory()->create(['name' => 'Еда']);
        $meat = Activity::factory()->create(['name' => 'Мясная продукция', 'parent_id' => $food->id]);
        $milk = Activity::factory()->create(['name' => 'Молочная продукция', 'parent_id' => $food->id]);

        $cars = Activity::factory()->create(['name' => 'Автомобили']);
        $trucks = Activity::factory()->create(['name' => 'Грузовые', 'parent_id' => $cars->id]);
        $passenger = Activity::factory()->create(['name' => 'Легковые', 'parent_id' => $cars->id]);
        $parts = Activity::factory()->create(['name' => 'Запчасти', 'parent_id' => $passenger->id]);
        $accessories = Activity::factory()->create(['name' => 'Аксессуары', 'parent_id' => $passenger->id]);

        Organization::factory(20)->create()->each(function ($org) use ($food, $meat, $milk, $cars, $trucks) {
            $org->activities()->attach([
                $food->id, $meat->id, $milk->id, $cars->id, $trucks->id
            ]);
        });
    }
}
