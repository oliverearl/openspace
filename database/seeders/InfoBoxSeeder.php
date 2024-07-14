<?php

namespace Database\Seeders;

use App\Models\InfoBox;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class InfoBoxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TODO: Finish routes.
        $boxes = [
            [
                'title' => 'Retro Social',
                'description' => 'All the things you missed most about social networks are back: Bulletins, blogs, forums, and so much more!',
                'link' => sprintf('Join %s today', Config::string('app.name')),
                'destination' => route('register'),
            ],
            [
                'title' => 'Privacy Friendly',
                'description' => 'No algorithms, no tracking, no personalized ads - just a safe space for you and your friends to hang out online!',
                'link' => 'Browse profiles',
                'destination' => '',
            ],
            [
                'title' => 'Fully Customizable',
                'description' => 'Featuring custom HTML and CSS to give you all the freedom you need to make your profile truly <em>your</em> space on the web!',
                'link' => 'Discover layouts',
                'destination' => '',
            ],
            [
                'title' => 'Join today!',
                'description' => 'Join your friends on the web or meet some new ones.',
                'link' => 'Sign up now',
                'destination' => route('register'),
            ],
        ];

        foreach ($boxes as $box) {
            InfoBox::create(array_merge($box, [
                'active_from' => Carbon::today(),
                'active_to' => null,
            ]));
        }
    }
}
