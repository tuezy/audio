<?php
namespace App\Helpers;

use App\Repository\SettingRepository;
use Illuminate\Support\Str;

class Core{

    protected $settingRepository;

    public function __construct()
    {
        $this->settingRepository = app(SettingRepository::class);
    }

    public function formatKey($key){
        return Str::replace('.', '_', $key);
    }
    public function getData(string $key, $default = null){

        static $loadedData;

        if(isset($loadedData[$key])){
            return $loadedData[$key];
        }

        $settings = $this->settingRepository->all(['code','value']);

        if($settings){
            foreach($settings as $setting){
                $loadedData[$setting->code] = $setting->value;

                if($setting->code == $key){
                    return $setting->value;
                }
            }
        }

        if(config()->has($key)){
            $default = config($key);
        }
        if(
            (is_null($default) || is_array($default))
            && config()->has($key.'.default')
        ){
            $default = config($key.'.default');
        }

        $loadedData[$key] = $default;

        return $loadedData[$key];
    }

}
