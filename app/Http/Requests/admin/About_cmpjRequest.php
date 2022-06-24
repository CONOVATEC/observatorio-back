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
           'ordinance' => 'required|min:3|max:255|string',
           'about_us' => 'required|min:3|max:255|string',
           'vision'=>'required|min:3|max:255|string',
           'functions'=>'required|min:3|max:255|string',
           'board_of_directors'=>'required|min:3|max:255|string',
           'social'=>'required|int',
       ];
       
       return  $rules;
    }
}
