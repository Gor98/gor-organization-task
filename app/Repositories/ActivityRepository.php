<?php

namespace App\Repositories;

use App\Common\Bases\Repository;
use App\Common\Exceptions\RepositoryException;
use App\Models\Activity;
use Illuminate\Support\Collection;

class ActivityRepository extends Repository
{
    /**
     * @return string
     */
    protected function model(): string
    {
        return Activity::class;
    }

    /**
     * @param int $activity_id
     * @return array
     * @throws RepositoryException
     */
    public function getActivityIds(int $activity_id): Collection
    {
        return $this->query()
            ->whereParentId($activity_id)
            ->orWhere('id', $activity_id)
            ->pluck('id');
    }
}
