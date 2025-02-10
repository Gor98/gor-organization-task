<?php

namespace App\Repositories;

use App\Common\Bases\Repository;
use App\Models\Building;

class BuildingRepository extends Repository
{
    /**
     * @return string
     */
    protected function model(): string
    {
        return Building::class;
    }
}
