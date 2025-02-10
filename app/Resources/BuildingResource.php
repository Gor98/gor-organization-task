<?php


namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class BuildingResource
 * @package App\Resources
 */
class BuildingResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ];
    }
}
