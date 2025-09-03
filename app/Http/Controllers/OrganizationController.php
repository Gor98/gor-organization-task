<?php

namespace App\Http\Controllers;

use App\Common\Tools\APIResponse;
use App\Contracts\OrganizationServiceContract;
use App\Http\Requests\Organization\SearchByLocationRequest;
use App\Http\Requests\Organization\SearchByNameRequest;
use App\Resources\OrganizationResource;
use Illuminate\Http\JsonResponse;

class OrganizationController extends Controller
{
    public function __construct(
        protected OrganizationServiceContract $organizationServiceContract
    ) {
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $organization = $this->organizationServiceContract->find($id);

        return APIResponse::successResponse(new OrganizationResource($organization));
    }

    /**
     * List all organizations in a specific building.
     *
     * @param int $building_id
     * @return JsonResponse
     */
    public function byBuilding(int $building_id): JsonResponse
    {
        $organizations = $this->organizationServiceContract->findByBuilding($building_id);

        return APIResponse::successResponse(OrganizationResource::collection($organizations));
    }

    /**
     * List all organizations for a specific activity (including nested activities).
     *
     * @param int $activity_id
     * @return JsonResponse
     */
    public function byActivity(int $activity_id): JsonResponse
    {
        $organizations = $this->organizationServiceContract->findByActivity($activity_id);

        return APIResponse::successResponse(OrganizationResource::collection($organizations));
    }

    /**
     * List organizations within a given radius from a point (latitude, longitude).
     *
     * @param SearchByLocationRequest $request
     * @return JsonResponse
     */
    public function byLocation(SearchByLocationRequest $request): JsonResponse
    {
        $organizations = $this->organizationServiceContract->findByLocation($request->all());

        return APIResponse::collectionResponse(OrganizationResource::collection($organizations));
    }

    /**
     * Search organizations by name.
     *
     * @param SearchByNameRequest $request
     * @return JsonResponse
     */
    public function searchByName(SearchByNameRequest $request): JsonResponse
    {
        $organizations = $this->organizationServiceContract->findByName($request->input('name'));

        return APIResponse::successResponse(OrganizationResource::collection($organizations));
    }
}
