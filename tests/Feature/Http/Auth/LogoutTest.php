<?php

namespace Tests\Feature\Http\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::factory()->state(['email' => 'test@gmail.com'])->create();
    }

    public function test_logout()
    {
        $this->actingAs($this->user)->post('/api/auth/logout')->assertOk();
    }
}
