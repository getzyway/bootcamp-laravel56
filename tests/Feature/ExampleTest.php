<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function testLoginSuccess()
    {
        $credential = [
            'email' => 'user1@gmail.com',
            'password' => 'password'
        ];
        
        $this->withoutMiddleware();
        
        Auth::shouldReceive('attempt')->once()->withAnyArgs()->andReturn(true);
        Auth::shouldReceive('user')->once()->withAnyArgs()->andReturn(true);

        $response = $this->post('login',$credential);

        $response->assertRedirect('admin/user');
    }

}
