<?php

namespace App\Contracts;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;

interface UserServiceContract
{
    public function profile(): Authenticatable;

    public function login(array $payload): string;

    public function logout(): void;

    public function register(array $payload): User;
}
