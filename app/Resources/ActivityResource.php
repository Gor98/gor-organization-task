<?php


namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ActivityResource
 * @package App\Resources
 */
class ActivityResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'parent_id' => $this->parent_id,
            'children' => ActivityResource::collection($this->whenLoaded('children')),
        ];
    }
}
