<?php

namespace App\Repositories;

use App\Common\Bases\Repository;
use App\Models\User;

class UserRepository extends Repository
{
    protected array $fillable = [
        'first_name',
        'last_name',
        'gender',
        'email',
        'password',
    ];

    /**
     * @return string
     */
    protected function model(): string
    {
        return User::class;
    }
}
