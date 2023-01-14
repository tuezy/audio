<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\SettingsRequest;
use App\Repository\SettingRepository;
use Illuminate\Http\Request;

class SettingsController extends BaseDashboardController
{
    protected $settingRepository;

    public function __construct(SettingRepository $settingRepository)
    {
        parent::__construct();

        $this->settingRepository = $settingRepository;

    }

    public function index(Request $request){

        $settings = config("dashboard");

        return view("dashboard::pages.settings.index", [
            'keys' => array_keys($settings),
            'settings' => $settings,
            'pageTitle' => 'Configuration'
        ]);
    }

    public function update(SettingsRequest $request){

        $validated = $request->validated();

        $settingsValues = app('settings_values');

        foreach ($settingsValues as $needToUpdate){
            if(!isset($validated[$needToUpdate])){
                $validated[$needToUpdate] = false;
            }
            if($validated[$needToUpdate] == 'on'){
                $validated[$needToUpdate] = true;
            }

            $this->settingRepository->updateOrCreate(
                [
                    'code' => $needToUpdate
                ],
                [
                    'value' => $validated[$needToUpdate]
                ]);
        }
        return redirect()->route('dashboard.settings.index')->with('success', __('dashboard.update-success'));
    }
}
