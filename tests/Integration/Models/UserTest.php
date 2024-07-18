<?php

use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

beforeEach(function (): void {
    $this->user = User::factory()->create();
});

it('can cast its date fields into carbon objects', function (): void {
    expect($this->user->email_verified_at)
        ->toBeInstanceOf(Carbon::class)
        ->and($this->user->last_active_at)->toBeInstanceOf(CarbonImmutable::class)
        ->and($this->user->last_logged_in_at)->toBeInstanceOf(CarbonImmutable::class)
        ->and($this->user->created_at)->toBeInstanceOf(CarbonImmutable::class)
        ->and($this->user->updated_at)->toBeInstanceOf(CarbonImmutable::class);
});

it('hashes its passwords', function (): void {
    expect($this->user->password)
        ->not()->toEqual('password')
        ->and(password_verify('password', $this->user->password))->toBeTrue();
});
