<?php


namespace App\Services;


use App\Models\Transaction;
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
}
