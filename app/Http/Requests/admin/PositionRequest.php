<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
        $position = $this->route()->parameters();
        $rules = [
            'name' => 'required|min:2|max:255|string|unique:positions',
            'slug' => 'nullable|string'
        ];
        if ($position) {
            $rules['name'] = 'required|unique:positions,name,' .(implode($position));
        }
        return  $rules;
    }
}
