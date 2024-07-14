<?php

namespace App\View\Components;

use App\Repositories\InfoBoxRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class InfoArea extends Component
{
    /**
     * The key that can be used to bust the info area cache.
     */
    public const string INFO_AREA_KEY = 'info_box_key';

    /**
     * Constructs a new instance of the info area component.
     */
    public function __construct(public readonly InfoBoxRepository $repository) {}

    /**
     * Busts the info area cache and forces it to reload.
     */
    public static function reset(): void
    {
        Cache::forget(self::INFO_AREA_KEY);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.info-area', [
            'cells' => $this->getInfoBoxes(),
        ]);
    }

    /**
     * Returns a cached version of the frontpage info boxes.
     *
     * @return \Illuminate\Support\Collection<int, \App\Models\InfoBox>
     */
    private function getInfoBoxes(): Collection
    {
        return Cache::rememberForever('info-boxes', fn(): Collection => $this->repository->getFrontpageBoxes());
    }
}
