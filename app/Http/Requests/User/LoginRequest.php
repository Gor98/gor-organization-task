<?php

namespace App\Http\Requests\User;

use App\Common\Bases\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * @return string[]
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ];
    }
}
