<?php

namespace App\Http\Requests\Organization;

use App\Common\Bases\BaseRequest;

class SearchByNameRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
        ];
    }
}
