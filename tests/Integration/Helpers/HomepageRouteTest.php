<?php

use App\Models\User;

it('can return the correct homepage route for guests', function (): void {
   $this->assertGuest();

   expect(homepage_route())->not()->toContain('home');
});

it('can return the correct homepage route for authenticated users', function (): void {
   $user = User::factory()->create();
   $this->actingAs($user);

   expect(homepage_route())->toContain('home');
});
