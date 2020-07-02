<?php


namespace App\Services;


use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class TransactionService
{
    public Transaction $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    /**
     * @param array $transactionData
     * @return Transaction|Model
     */
    public function createTransaction(array $transactionData): Transaction
    {
        return $this->transaction->newQuery()->create($transactionData + ['user_id' => auth()->id()]);
    }

    /**
     * @param int $userId
     * @return Transaction[]|Builder[]|Collection
     */
    public function getUserTransactions(int $userId): Collection
    {
        return $this->transaction->newQuery()->where('user_id', $userId)->get();
    }
}
