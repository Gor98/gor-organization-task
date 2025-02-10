<?php


namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class OrganizationResource
 * @package App\Resources
 */
class OrganizationResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone_numbers' => $this->phone_numbers,
            'building_id' => $this->phone_numbers,
            'created_at' => format($this->created_at),
            'building' => new BuildingResource($this->whenLoaded('building')),
            'activities' => ActivityResource::collection($this->whenLoaded('activities')),
            ];
    }
}
