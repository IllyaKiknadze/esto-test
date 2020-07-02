<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;

class UserService
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @param array $userData
     * @return User|Model
     */
    public function createUser(array $userData): User
    {
        return $this->user->newQuery()->create($userData);
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Builder[]|Collection
     */
    public function getLatestUsers() : Collection
    {
        return $this->user->newQuery()->orderByDesc('created_at')->get();
    }
}
