<?php

namespace App\Providers;

use App\Helpers\Core;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class KodingServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->alias('core', \App\Facades\Core::class);
        $this->app->singleton('core', function (){
            return new Core();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->initSettingsPage();
    }

    public function initSettingsPage(){
        $settings = config('dashboard');
        $this->app->instance('settings_keys', array_keys($settings));

        $pageSettings = [];

        $configs = [];

        foreach ($settings as $settingKey => $settingValue){
            foreach ($settingValue as $configKey => $configValue){

                $configs[$configKey] = $configValue;

                if(is_array($configValue)){
                    foreach ($configValue as $k => $v){
                        if($k == 'key'){
                            $configs[$configKey]['inputKey'] = Str::replace('.','_', $v);
                            $pageSettings[] = $configs[$configKey]['inputKey'];
                        }
                    }
                }
            }
        }

        $this->app->instance('settings_values', $pageSettings);
    }
}
