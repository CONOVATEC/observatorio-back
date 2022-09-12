<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class DirectiveRequest extends FormRequest
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
       $directive = $this->route()->parameters();
       $rules = [
           'name' => 'required|min:2|max:100|string|unique:directives',
           'position_id'=>'required',


       ];
       if ($directive) {
           $rules=[
               'name' => 'required|min:2|max:100|string|unique:directives,name,' .(implode($directive)),
               'position_id'=>'required',

           ];
           }
       return  $rules;

    }
}
