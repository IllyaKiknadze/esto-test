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

        $this->post('/transactions', [
            'type_id' => TransactionTypes::inRandomOrder()->first()->id,
            'amount'  => $this->faker->numberBetween(100, 1000)
        ])->assertResponseOk()
            ->seeJsonStructure([
                'status',
                'message',
                'transaction'
            ]);
    }
}
