<?php


namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Model;

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
    public function createUser(array $userData)
    {
        return $this->user->create($userData);
    }
}
