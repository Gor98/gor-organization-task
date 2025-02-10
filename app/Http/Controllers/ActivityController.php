<?php

namespace App\Http\Controllers;

use App\Common\Tools\APIResponse;
use App\Contracts\ActivityServiceContract;
use App\Resources\ActivityResource;
use Illuminate\Http\JsonResponse;

class ActivityController extends Controller
{
    public function __construct(
        protected ActivityServiceContract $activityServiceContract
    ) {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $activities = $this->activityServiceContract->all();

        return APIResponse::successResponse(ActivityResource::collection($activities));
    }
}
