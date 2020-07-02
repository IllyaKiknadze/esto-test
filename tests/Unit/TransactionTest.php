<?php

namespace Tests\Feature;

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
        $response = $this->post('/transaction', [
            'type_id' => TransactionType::first()->id,
            'user_id' => User::first()->id,
            'amount'  => $this->faker->numberBetween(100, 1000)
        ]);
    }
}
