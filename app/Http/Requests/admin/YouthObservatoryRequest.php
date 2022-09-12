<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class YouthObservatoryRequest extends FormRequest
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

        $rules = [
            'mission' => 'required|min:3|string',
            'vision' => 'required|min:3|string',
            'about_us'=>'min:3|string',
        ];



        return  $rules;
    }
}
