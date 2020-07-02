<?php

namespace Tests\Feature;

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

        $this->post('users/transactions', [
            'type_id' => TransactionTypes::inRandomOrder()->first()->id,
            'amount'  => $this->faker->numberBetween(100, 1000)
        ])->assertResponseOk()
            ->seeJsonStructure([
                'status',
                'message',
                'transaction' => [
                    'id',
                    'user' => [
                        'id',
                        'name',
                        'email',
                        'created_at',
                        'updated_at'
                    ],
                    'type' => [
                        'id',
                        'title'
                    ]
                ]
            ]);
    }

    public function testGetTransactions()
    {
        auth()->loginUsingId(1);

        $this->get('users/transactions')
            ->see(auth()->user()->name . ' transactions');
    }
}
