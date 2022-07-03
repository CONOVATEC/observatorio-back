<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PolicyRequest extends FormRequest
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
         $policy = $this->route()->parameters();
        $rules = [
            'name' => 'required|min:3|max:255|string|unique:youth_policies',
            'descripcion' => 'nullable|string'
        ];
        if ($policy) {
            $rules['name'] = 'required|unique:youth_policies,name,' .(implode($policy));
        }
        return  $rules;
    }
}