<?php

namespace App\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Contracts\ActivityServiceContract;
use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Illuminate\Support\Collection;

class ActivityService extends Service implements ActivityServiceContract
{
    public function __construct(
     protected ActivityRepository $activityRepository
    ) {
    }

    /**
     * @return Collection
     * @throws RepositoryException
     */
    public function all(): Collection
    {
        return $this->activityRepository->query()->with(['children.children'])->whereNull('parent_id')->get();
    }
}
