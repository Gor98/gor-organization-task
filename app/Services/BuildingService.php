<?php

namespace App\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Contracts\BuildingServiceContract;
use App\Repositories\BuildingRepository;
use Illuminate\Support\Collection;

class BuildingService extends Service implements BuildingServiceContract
{
    public function __construct(
     protected BuildingRepository $buildingRepository
    ){
    }

    /**
     * @return Collection
     * @throws RepositoryException
     */
    public function all(): Collection
    {
        return $this->buildingRepository->all();
    }
}
