<?php


namespace App\Services;


use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        $user = new User();
        $user->password = Hash::make($userData['password']);
        $user->email = $userData['email'];
        $user->name = $userData['name'];
        $user->permissions = $userData['permissions'] ?? false;
        $user->save();

        return $user;
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Builder[]|Collection
     */
    public function getUsers(): Collection
    {
        return $this->user->newQuery()->get();
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Builder[]|Collection
     */
    public function getLatestUsers(): Collection
    {
        return $this->user->newQuery()
            ->orderByDesc('created_at')
            ->addSelect(['debit_amount' => Transaction::selectRaw('sum(amount) as total')
                ->where('type_id',Transaction::TYPE_DEBIT_ID)
                ->whereColumn('user_id', 'users.id')
                ->groupBy('user_id')
            ])
            ->with('transactions')
            ->take(10)->get();
    }
}
