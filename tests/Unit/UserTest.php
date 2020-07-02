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
        auth()->loginUsingId(1);

        $this->post('/users', [
            'email'       => 'admin2@gmail.com',
            'password'    => '123123123',
            'permissions' => 1,
            'name'        => 'admin2'
        ])->assertRedirectedTo('/users/latest');
    }

    public function testGetUsers()
    {
        $this->get('/users')->assertResponseOk()
            ->seeJsonStructure([
                'status', 'message',
                'users' =>
                    ['*' =>
                         [
                             'email',
                             'name',
                             'permissions'
                         ]
                    ]
            ]);
    }
}
