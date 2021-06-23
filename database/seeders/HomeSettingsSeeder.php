<?php

namespace Database\Seeders;

use App\Models\TableSettings as Settings;
use Illuminate\Database\Seeder;

class HomeSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $defaultStyling = json_encode([
            "size" => "14px",
            "weight" => "bold",
            "colour" => "black"
        ]);

        $settings = [
            [
                'element_name' => 'Dropee.com',
                'positioning' => json_encode([
                    'row' => 1,
                    'column' => 2
                ]),
                'font_style' => $defaultStyling,
            ],
            [
                'element_name' => 'B2B Marketplace',
                'positioning' => json_encode([
                    'row' => 3,
                    'column' => 1
                ]),
                'font_style' => $defaultStyling,
            ],
            [
                'element_name' => 'SaaS enabled marketplace',
                'positioning' => json_encode([
                    'row' => 2,
                    'column' => 3
                ]),
                'font_style' => $defaultStyling,
            ],
            [
                'element_name' => 'Provide transparency',
                'positioning' => json_encode([
                    'row' => 4,
                    'column' => 4
                ]),
                'font_style' => $defaultStyling,
            ],
            [
                'element_name' => 'Build Trust',
                'positioning' => json_encode([
                    'row' => 1,
                    'column' => 4
                ]),
                'font_style' => $defaultStyling,
            ],
        ];

        foreach ($settings as $setting) {
            Settings::create($setting);
        }
    }
}
