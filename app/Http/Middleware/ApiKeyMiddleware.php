<?php

namespace App\Http\Middleware;

use App\Common\Tools\APIResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $apiKey = config('api.key');
        $requestApiKey = $request->header('X-API-KEY');

        if (!$requestApiKey || $requestApiKey !== $apiKey) {
//            return APIResponse::errorResponse([], 'Unauthorized: Invalid API Key', Response::HTTP_UNAUTHORIZED);
        }

        return $next($request);
    }
}
