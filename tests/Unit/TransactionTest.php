<?php

namespace Tests\Feature;

use App\Models\Transaction;
use App\Models\TransactionTypes;
use App\Models\User;
use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreate()
    {
        auth()->loginUsingId(1);
        $amount = $this->faker->numberBetween(100, 1000);
        $transactionTypeId = TransactionTypes::inRandomOrder()->first()->id;
        $this->post('users/transactions', [
            'type_id' => $transactionTypeId,
            'amount'  => $amount
        ])->assertRedirectedTo('users/transactions');

        $transaction = Transaction::where('user_id', 1)
            ->where('type_id', $transactionTypeId)->first();

        $this->assertEquals($amount, $transaction->amount);

    }

    public function testGetTransactions()
    {
        auth()->loginUsingId(1);

        $this->get('users/transactions')
            ->see(auth()->user()->name . ' transactions')->see('1');
    }
}
