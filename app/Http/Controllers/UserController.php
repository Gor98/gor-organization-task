<?php

namespace App\Http\Controllers;

use App\Common\Tools\APIResponse;
use App\Contracts\UserServiceContract;
use App\Resources\UserResource;
use App\Resources\LoginResource;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\RegisterRequest;

class UserController extends Controller
{
    public function __construct(
        protected UserServiceContract $userServiceContract
    ) {
    }

    /**
     * Display the specified resource.
     *
     * @return JsonResponse
     */
    public function profile(): JsonResponse
    {
        $user = $this->userServiceContract->profile();

        return APIResponse::successResponse(new UserResource($user));
    }

    /**
     * Login user
     *
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $token = $this->userServiceContract->login($request->all());

        return APIResponse::successResponse(new LoginResource($token));
    }

    /**
     * Logout user
     *
     * @return JsonResponse
     */
    public function logout(): JsonResponse
    {
        $this->userServiceContract->logout();

        return APIResponse::successResponse();
    }

    /**
     * Register user
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = $this->userServiceContract->register($request->all());

        return APIResponse::successResponse(new UserResource($user));
    }
}
