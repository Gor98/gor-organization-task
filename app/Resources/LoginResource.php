<?php


namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class OrganizationResource
 * @package App\Resources
 */
class LoginResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'token' => $this->resource,
        ];
    }
}
