<?php

declare(strict_types=1);

use App\Models\User;
use Carbon\CarbonImmutable;
use Illuminate\Support\Carbon;

beforeEach(function (): void {
    $this->user = User::factory()->create();
});

describe('casts', function (): void {
    it('will automatically populate its uuid field if left empty', function (): void {
        $user = User::factory()->create(['uuid' => null]);

        expect($user->uuid)
            ->not()->toBeNull()
            ->toBeUuid();
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
});

describe('attributes', function (): void {
    it('can retrieve its profile url')->todo();

    it('can retrieve the url of its profile picture', function (): void {
        expect($this->user->media()->count())->toEqual(0);

        $pixel = 'iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVQIW2MIycj4DwAEXAIkcO06cgAAAABJRU5ErkJggg==';
        $this->user->addMediaFromBase64($pixel)->toMediaCollection(User::PROFILE_PICTURE_LIBRARY);

        expect($this->user->media()->count())
            ->toEqual(1)
            ->and($this->user->profile_picture)->toBeUrl();
    });
});
