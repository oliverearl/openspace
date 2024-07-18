<?php

namespace App\View\Components;

use App\Repositories\UserRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class NewPeople extends Component
{
    /**
     * The key that can be used to bust the new people cache.
     */
    public const string NEW_PEOPLE_KEY = 'new_people_key';

    /**
     * Busts the new people cache and forces it to reload.
     */
    public static function reset(): void
    {
        Cache::forget(self::NEW_PEOPLE_KEY);
    }

    /**
     * Constructs a new instance of the new people component.
     */
    public function __construct(public readonly UserRepository $repository) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.new-people', [
            'people' => $this->getLatestUsers(),
        ]);
    }

    /**
     * Retrieve the latest users.
     *
     * @return \Illuminate\Support\Collection<int, \App\Models\User>
     */
    private function getLatestUsers(): Collection
    {
        return Cache::rememberForever(
            self::NEW_PEOPLE_KEY,
            fn(): Collection => $this->repository->getLatestUsers(),
        );
    }
}
