<?php

use App\Models\User;

it('can render the login page', function (): void {
    $this->assertGuest();

    $this->get(route('login'))->assertOk();
});

it('will redirect elsewhere if trying to access the login page whilst authenticated', function (): void {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->get(route('login'))->assertRedirectToRoute('home');
});

it('can log into an account', function (): void {
    $user = User::factory()->create();

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => 'password',
        'password_confirmation' => 'password',
        'remember' => true,
    ])
        ->assertRedirectToRoute('home');

    $this->assertAuthenticatedAs($user);
});

it('will redirect in response to a login attempt when already authenticated', function (): void {
    $authenticatedUser = User::factory()->create();
    $this->actingAs($authenticatedUser);

    $anotherUser = User::factory()->create();

    $this->post(route('login'), [
        'email' => $anotherUser->email,
        'password' => 'password',
        'password_confirmation' => 'password',
        'remember' => true,
    ])
        ->assertRedirectToRoute('home');

    $this->assertAuthenticatedAs($authenticatedUser);
});

it('will not authenticate incorrect credentials', function (): void {
    $user = User::factory()->create();
    $wrongPassword = 'not_password';

    expect(password_verify($wrongPassword, $user->password))->toBeFalse();

    $this->post(route('login'), [
        'email' => $user->email,
        'password' => $wrongPassword,
        'password_confirmation' => $wrongPassword,
        'remember' => true,
    ])
        ->assertRedirectToRoute('homepage');

    $this->assertGuest();
});
