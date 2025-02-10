<?php

namespace App\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Contracts\OrganizationServiceContract;
use App\Models\Organization;
use App\Repositories\ActivityRepository;
use App\Repositories\OrganizationRepository;
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
        $activityIds = $this->activityRepository
            ->query()
            ->whereParentId($activity_id)
            ->orWhereId($activity_id)
            ->pluck('id');

        return $this->organizationRepository->query()
            ->whereHas('activities', function ($query) use ($activityIds) {
            $query->whereIn('activity_id', $activityIds);
        })->get();
    }

    /**
     * @param array $payload
     * @return Collection
     * @throws RepositoryException
     */
    public function findByLocation(array $payload): Collection
    {
        $latitude = $payload['latitude'];
        $longitude = $payload['longitude'];
        $radius = $payload['radius'];

        return $this->organizationRepository
            ->query()
            ->whereHas('building', function ($query) use ($latitude, $longitude, $radius) {
            $query->whereRaw("(6371 * acos(cos(radians(?)) * cos(radians(latitude))
            * cos(radians(longitude) - radians(?)) + sin(radians(?))
            * sin(radians(latitude)))) < ?", [$latitude, $longitude, $latitude, $radius]
            );
        })->get();
    }

    /**
     * @param string $name
     * @return Collection
     * @throws RepositoryException
     */
    public function findByName(string $name): Collection
    {
        return $this->organizationRepository->query()->where('name', 'LIKE', "%{$name}%")->get();
    }
}
