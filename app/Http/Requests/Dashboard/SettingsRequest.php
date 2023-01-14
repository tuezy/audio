<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SettingsRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $settings = config("dashboard");

        $validation = [];

        foreach ($settings as $setting){
            foreach($setting as $config){
                $validation[Str::replace('.', '_', $config['key'])] = $config['validate'] ?? '';
            }
        }
        return $validation;
    }
}
