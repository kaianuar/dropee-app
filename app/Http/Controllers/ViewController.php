<?php

namespace App\Http\Controllers;

use App\Models\TableSettings as Settings;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $tableColumns;
    protected $tableRows;
    protected $colours;
    protected $sizes;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->tableColumns = 4;
        $this->tableRows = 4;
        $this->colours = $this->getAvailableColours();
        $this->sizes = $this->getAvailableSizes();
        $this->weights = $this->getAvailableWeights();
    }

    public function index() 
    {
        $settings = $this->getAllSettings();

        $data = [
            'columns' => $this->tableColumns,
            'rows' => $this->tableRows,
            'settings' => $settings
        ];

        return view('pages.home', $data);
    }

    public function manage()
    {
        $settings = $this->getAllSettings();

        $data = [
            'columns' => $this->tableColumns,
            'colours' => $this->colours,
            'rows' => $this->tableRows,
            'settings' => $settings,
            'sizes' => $this->sizes,
            'weights' => $this->weights,
        ];

        return view('pages.manage', $data);
    }

    public function saveSettings(Request $request)
    {
        $settings = $request['settings'];
        
        $data = [];

        foreach ($settings as $key => $setting) {
            $data[] = [
                'id' => $key,
                'element_name' => $setting['element_name'],
                'positioning' => json_encode($setting['positioning']),
                'font_style' => json_encode($setting['font_style']),
            ];
        }

        $tableSettings = new Settings();
        $tableSettings::upsert($data, array_keys($data));

        return redirect()->route('manage');
    }

    private function getAllSettings()
    {
        $settings = Settings::getSettings();

        $tableSettings = [];

        foreach ($settings as $key => $setting) {
            $tableSettings[$setting->id] = [
                'element_name' => $setting->element_name,
                'positioning' => json_decode($setting->positioning),
                'font_style' => json_decode($setting->font_style),
            ];
        }

        return $tableSettings;
    }

    private function getAvailableColours()
    {
        // TODO: Return possible values from DB
        return [
            'black',
            'red',
            'yellow',
            'blue',
            'pink'
        ];
    }

    private function getAvailableSizes()
    {
        $sizes = [];

        for ($i=10; $i <= 20 ; $i++) { 
            $sizes[] = $i . 'px';
        }

        return $sizes;
    }

    private function getAvailableWeights()
    {
        return [
            'normal',
            'bold',
            'bolder',
            'lighter',
        ];
    }
}
