<?php

use App\Models\User;

it('can view the homepage as a guest', function (): void {
    $this->assertGuest();

    $this->get(route('homepage'))->assertOk();
});

it('cannot view the homepage as an authenticated user', function (): void {
    $user = User::factory()->create();
    $this->actingAs($user);

    $this->get(route('homepage'))->assertRedirectToRoute('home');
});
