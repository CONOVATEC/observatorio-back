<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class About_cmpjRequest extends FormRequest
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
           'title_cmpj' => 'required|min:3|max:255|string',
           'description_cmpj' => 'min:3|max:800|string',
           'title_assembly'=>'required|min:3|max:255|string',
           'description_assembly'=>'min:3|max:500|string',
           'title_directive'=>'required|min:3|max:255|string',
           'description_directive'=>'min:3|max:500|string',
           'link_video'=>'min:3|max:255|string',
           'link_drive'=>'min:3|max:255|string',

       ];

       return  $rules;
    }
}
