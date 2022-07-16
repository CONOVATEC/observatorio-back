<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class TypeLogoRequest extends FormRequest
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
         $typelogo = $this->route()->parameters();
        $rules = [
            'name' => 'required|min:3|max:255|string|unique:type_logo',
            'description' => 'nullable|string'
        ];
        if ($typelogo) {
            $rules['name'] = 'required|unique:type_logo,name,' .(implode($typelogo));
        }
        return  $rules;
    }
}
