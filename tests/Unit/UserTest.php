<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCreate()
    {
        \Auth::login(User::find(1));

        $this->post('/users', [
            'email'    => 'admin2@gmail.com',
            'password' => '123123123'
        ])->assertResponseOk()->assertJson('{"status":1,"message":"User created successfully"}');
    }
}
