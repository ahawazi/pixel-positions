<?php

use App\Models\Employer;
use App\Models\User;

use function Pest\Laravel\be;

beforeEach(function () {
    $this->employer = Employer::factory()->create();

    // $this->user = User::factory()->create();
    // be($this->user);
});

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $this->withoutExceptionHandling();
    $response->assertStatus(200);
});

test('new users can register', function () {
    $this->user = User::factory()->create();
    be($this->user);
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'employer_name' => $this->employer->name,
        'logo' => $this->employer->logo,
    ]);

    $this->withoutExceptionHandling();
    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});
