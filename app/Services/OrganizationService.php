<?php

namespace App\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Contracts\OrganizationServiceContract;
use App\Models\Organization;
use App\Repositories\ActivityRepository;
use App\Repositories\OrganizationRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class OrganizationService extends Service implements OrganizationServiceContract
{
    public function __construct(
        protected OrganizationRepository $organizationRepository,
        protected ActivityRepository $activityRepository,
    ) {
    }

    /**
     * @param int $id
     * @return Organization
     * @throws RepositoryException
     */
    public function find(int $id): Organization
    {
        return $this->organizationRepository->find($id, ['*'], ['building', 'activities']);
    }

    /**
     * @param int $building_id
     * @return Collection
     * @throws RepositoryException
     */
    public function findByBuilding(int $building_id): Collection
    {
        return $this->organizationRepository->query()->whereBuildingId($building_id)->get();
    }

    /**
     * @param int $activity_id
     * @return Collection
     * @throws RepositoryException
     */
    public function findByActivity(int $activity_id): Collection
    {
        $activityIds = $this->activityRepository->getActivityIds($activity_id);

        return $this->organizationRepository->findByActivity($activityIds);
    }

    /**
     * @param array $payload
     * @return LengthAwarePaginator
     * @throws RepositoryException
     */
    public function findByLocation(array $payload): LengthAwarePaginator
    {
        return $this->organizationRepository->findByLocation($payload);
    }

    /**
     * @param string $name
     * @return Collection
     * @throws RepositoryException
     */
    public function findByName(string $name): Collection
    {
        return $this->organizationRepository->findByName($name);
    }
}
