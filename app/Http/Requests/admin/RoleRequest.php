<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
        // $role = $this->route()->parameters();
        $role = $this->route()->parameter('role');
        $rules = [
            'name' => 'required|min:3|max:255|string|unique:roles',
            'slug' => 'required|min:3|max:255'
        ];
        if ($role) {
            // $rules['name'] = 'required|unique:roles,name,' . (implode($role));
            $rules['name'] = 'required|unique:roles,name,' . $role->id;
        }
        return  $rules;
    }
}