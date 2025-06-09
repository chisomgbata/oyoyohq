<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $homePageSlides = [
            [
                'image' => 'https://placehold.co/1920x1080?text=Slide+1&bg=333&fg=fff',
                'title' => 'Welcome to Our Store',
                'description' => 'Discover the latest trends and exclusive offers.',
                'color' => '#ffffff',
            ],
            [
                'image' => 'https://placehold.co/1920x1080?text=Slide+1&bg=333&fg=fff',
                'title' => 'Welcome to Our Store',
                'description' => 'Discover the latest trends and exclusive offers.',
                'color' => '#ffffff',
            ],
        ];

        Setting::create([
            'values' => $homePageSlides,
            'type' => 'slider',
            'key' => 'home_page_slides',
        ]);

        $socialLinks = [
            [
                'name' => 'LinkedIn',
                'url' => 'https://www.linkedin.com',
                'icon' => 'heroicon-o-globe-alt',
            ]
        ];

        Setting::create([
            'values' => $socialLinks,
            'type' => 'social_links',
            'key' => 'social_links',
        ]);

    }
}
