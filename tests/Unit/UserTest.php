<?php

namespace Tests\Unit;

use App\Models\User;
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

        $user = User::where('email', 'admin2@gmail.com')->first();
        $this->assertEquals(2, $user->id);
    }

    public function testLatestUsers()
    {
        $this->get('/users/latest')
            ->seeText('admin')
            ->seeText('admin@gmail.com');
    }
}
