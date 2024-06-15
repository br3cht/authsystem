<?php

namespace Tests\Feature\Http\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        User::factory()->state(['email' => 'test@gmail.com'])->create();
    }

    public function test_login_successfully(): void
    {
        $dataRequest = [
            'email' => 'test@gmail.com',
            'password' => 'password',
            'device' => 'mocked',
        ];

        $this->post('/api/auth/login', $dataRequest)->assertOk();
    }

    public function test_login_failed(): void
    {
        $dataRequest = [
            'email' => 'test@gmail.com',
            'password' => 'wrongPassword',
            'device' => 'mocked',
        ];

        $this->post('/api/auth/login', $dataRequest)->assertUnauthorized();
    }

}
