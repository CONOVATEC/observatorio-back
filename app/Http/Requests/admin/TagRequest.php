<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
        $tag = $this->route()->parameters();
        $rules = [
            'name' => 'required|min:3|max:255|string|unique:tags',
        ];
        if ($tag) {
            $rules['name'] = 'required|unique:tags,name,' .(implode($tag));
        }
        return  $rules;



    }
}
