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
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'radius' => 'required|numeric|min:0',
        ];
    }
}
