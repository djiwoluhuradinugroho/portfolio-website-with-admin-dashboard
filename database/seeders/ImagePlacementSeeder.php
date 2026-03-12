<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagePlacementSeeder extends Seeder
{
    public function run(): void
    {
        
        $placements = [

            [
                'key' => 'logo',
                'label' => 'Website Logo',
            ],

            [
                'key' => 'about_image',
                'label' => 'About Section Image',
            ],

            [
                'key' => 'service_image',
                'label' => 'Service Section Image',
            ],

            [
                'key' => 'portfolio_image',
                'label' => 'Portfolio Section Image',
            ],

            [
                'key' => 'howitworks_image',
                'label' => 'How It Works Image',
            ],

            [
                'key' => 'stack_image_1',
                'label' => 'Hero Stack Image 1',
            ],

            [
                'key' => 'stack_image_2',
                'label' => 'Hero Stack Image 2',
            ],

            [
                'key' => 'stack_image_3',
                'label' => 'Hero Stack Image 3',
            ],
        ];

        foreach ($placements as $placement) {

            DB::table('image_placements')->updateOrInsert(
                ['key' => $placement['key']],
                $placement
            );
        }
    }
}
