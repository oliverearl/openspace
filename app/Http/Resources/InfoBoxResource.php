<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\InfoBox */
class InfoBoxResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, string>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'destination' => $this->destination,
            'active_from' => $this->active_from->toISOString(),
            'active_to' => $this->active_to?->toISOString(),
        ];
    }
}
