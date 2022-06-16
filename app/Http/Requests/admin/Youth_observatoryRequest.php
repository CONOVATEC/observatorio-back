<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class Youth_observatoryRequest extends FormRequest
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
        $youthObservatorio = $this->route()->parameters();
        $rules = [
            'mission' => 'required|min:3|max:255|string',
            'vision' => 'required|min:3|max:255|string',
            'about_us'=>'required|min:3|max:255|string',
            'organization_chart'=>'required|min:3|max:255|string',
        ];
        if ($youthObservatorio) {
          
            $rules = [
                'mission' => 'required|min:3|max:255|string',
                'vision' => 'required|min:3|max:255|string',
                'about_us'=>'required|min:3|max:255|string',
                'organization_chart'=>'required|min:3|max:255|string',
            ];
            
        }
        return  $rules;
    }
}
