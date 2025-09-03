<?php

namespace App\Http\Requests\Organization;

use App\Common\Bases\BaseRequest;

class SearchByLocationRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'orderType' =>  'sometimes|in:asc,desc',
            'orderBy' =>  'sometimes|in:id,created_at',
            'perPage' =>  'sometimes|numeric',
            'page' =>  'sometimes|numeric',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric|min:0',
        ];
    }
}
