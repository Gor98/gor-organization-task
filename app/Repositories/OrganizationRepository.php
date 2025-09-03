<?php

namespace App\Repositories;

use App\Common\Bases\Repository;
use App\Common\Exceptions\RepositoryException;
use App\Models\Organization;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class OrganizationRepository extends Repository
{
    /**
     * @return string
     */
    protected function model(): string
    {
        return Organization::class;
    }

    /**
     * @param Collection $activityIds
     * @return Collection
     * @throws RepositoryException
     */
    public function findByActivity(Collection $activityIds): Collection
    {
        return $this->query()
            ->whereHas('activities', function ($query) use ($activityIds) {
                $query->whereIn('activity_id', $activityIds);
            })->get();
    }

    /**
     * @param array $payload
     * @return LengthAwarePaginator
     * @throws RepositoryException
     */
    public function findByLocation(array $payload): LengthAwarePaginator
    {
        $latitude = $payload['latitude'];
        $longitude = $payload['longitude'];
        $radius = $payload['radius'];

        return $this->query()
            ->whereHas('building', function ($query) use ($latitude, $longitude, $radius) {
                $query->whereRaw("(6371 * acos(cos(radians(?)) * cos(radians(latitude))
            * cos(radians(longitude) - radians(?)) + sin(radians(?))
            * sin(radians(latitude)))) < ?", [$latitude, $longitude, $latitude, $radius]
                );
            })->orderBy($payload['orderBy'], $payload['orderType'])
            ->paginate($payload['perPage']);
    }

    /**
     * @param string $name
     * @return Collection
     * @throws RepositoryException
     */
    public function findByName(string $name): Collection
    {
        return $this->query()->where('name', 'LIKE', "%{$name}%")->get();
    }
}
