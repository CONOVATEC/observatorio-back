<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ThematicRequest extends FormRequest
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
         $thematic = $this->route()->parameters();
        $rules = [
            'name' => 'required|min:3|max:150|string|unique:thematics',
            'description' => 'nullable|string',
            'url_icono' => 'nullable|string'
        ];
        if ($thematic) {
            $rules['name'] = 'required|unique:thematics,name,' .(implode($thematic));
        }
        return  $rules;
    }
}
