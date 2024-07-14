<?php

use App\Models\InfoBox;
use Illuminate\Support\Carbon;

beforeEach(function (): void {
    $this->box = InfoBox::factory()->create();
});

it('can cast its date fields into carbon objects', function (): void {
   expect($this->box->active_from)
       ->toBeInstanceOf(Carbon::class)
       ->and($this->box->active_to)->toBeInstanceOf(Carbon::class);
});

it('can scope eloquent queries to only active info boxes', function (): void {
    Carbon::setTestNow($this->box->active_to->copy()->subWeek());

    /** @var \App\Models\InfoBox $immortalBox */
    $immortalBox = InfoBox::factory()->nonperishable()->create();
    $ids = InfoBox::query()->isActive()->pluck('id');

    expect($ids)->toContain($this->box->id, $immortalBox->id);
});
