<?php

namespace App\Http\Requests\User;

use App\Common\Bases\BaseRequest;

class RegisterRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|boolean',
            'email' => 'required|email',
            'password' => 'required|string|confirmed',
        ];
    }
}
