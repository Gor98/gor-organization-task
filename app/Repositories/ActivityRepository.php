<?php

namespace App\Repositories;

use App\Common\Bases\Repository;
use App\Models\Activity;

class ActivityRepository extends Repository
{
    /**
     * @return string
     */
    protected function model(): string
    {
        return Activity::class;
    }
}
