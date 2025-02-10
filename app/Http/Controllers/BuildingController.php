<?php

namespace App\Http\Controllers;

use App\Common\Tools\APIResponse;
use App\Contracts\BuildingServiceContract;
use App\Resources\BuildingResource;
use Illuminate\Http\JsonResponse;

class BuildingController extends Controller
{
    public function __construct(
        protected BuildingServiceContract $buildingServiceContract
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $buildings = $this->buildingServiceContract->all();

        return APIResponse::successResponse(BuildingResource::collection($buildings));
    }
}
