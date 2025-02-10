<?php

namespace App\Contracts;

use App\Models\Organization;
use Illuminate\Support\Collection;

interface OrganizationServiceContract
{
    public function find(int $id): Organization;

    public function findByBuilding(int $building_id): Collection;

    public function findByActivity(int $activity_id): Collection;

    public function findByLocation(array $payload): Collection;

    public function findByName(string $name): Collection;
}
