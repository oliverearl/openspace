<?php

declare(strict_types=1);

use App\Models\InfoBox;

beforeEach(function (): void {
    $this->box = InfoBox::factory()->nonperishable()->create();
});

it('can retrieve info boxes', function (): void {
    $this->getJson(route('api.v1.info-boxes.index'))
        ->assertOk()
        ->assertJson([
            'data' => [
                [
                    'title' => $this->box->title,
                    'description' => $this->box->description,
                    'link' => $this->box->link,
                    'destination' => $this->box->destination,
                    'active_from' => $this->box->active_from->toISOString(),
                    'active_to' => null,
                ],
            ],
        ]);
});

it('can retrieve a single info box', function (): void {
    $this->getjson(route('api.v1.info-boxes.show', $this->box))
        ->assertOk()
        ->assertJson([
            'data' => [
                'title' => $this->box->title,
                'description' => $this->box->description,
                'link' => $this->box->link,
                'destination' => $this->box->destination,
                'active_from' => $this->box->active_from->toISOString(),
                'active_to' => null,
            ],
        ]);
});

it('can create an info box')->todo();

it('can update an info box')->todo();

it('can delete an info box')->todo();
