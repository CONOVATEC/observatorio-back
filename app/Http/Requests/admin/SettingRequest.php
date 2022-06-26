<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        // Verificamos que en la ruta trae un parámetro
        $setting = $this->route()->parameters();
        $rules = [
            'name_entity' => 'required|min:2|max:100|string|unique:settings',
            'logo' => 'mimes:jpg,jpeg,bmp,png',
            'link_facebook' => 'url',
            'link_instagram' => 'url',
            'link_linkedin' => 'url',
            'link_youtube' => 'url',

        ];
        if ($setting) {
            $rules=[
                'name_entity' => 'required|min:2|max:100|string|unique:settings,name_entity,' .(implode($setting)),
                'logo' => 'mimes:jpg,jpeg,bmp,png',
                'link_facebook' => 'url',
                'link_instagram' => 'url',
                'link_linkedin' => 'url',
                'link_youtube' => 'url',

            ];
            }
        return  $rules;
    }
}
