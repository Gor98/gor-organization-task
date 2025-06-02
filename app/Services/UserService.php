<?php

namespace App\Services;

use App\Common\Bases\Service;
use App\Common\Exceptions\RepositoryException;
use App\Contracts\UserServiceContract;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\AuthenticationException;

class UserService extends Service implements UserServiceContract
{
    public function __construct(
        protected UserRepository $userRepository,
    ) {
    }

    public function profile(): Authenticatable
    {
        return auth()->user();
    }

    /**
     * @throws AuthenticationException
     * @throws RepositoryException
     */
    public function login(array $payload): string
    {
        $user = $this->userRepository->findBy(['email' => $payload['email']]);

        if (!$user || !Hash::check($payload['password'], $user->password)) {
            throw new AuthenticationException('Invalid credentials');
        }

        return $user->createToken('api-token')->plainTextToken;
    }

    public function logout(): void
    {
        auth()->logout();
    }

    public function register(array $payload): User
    {
        return $this->userRepository->create($payload);
    }
}
