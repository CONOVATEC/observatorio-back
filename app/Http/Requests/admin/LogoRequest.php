<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class LogoRequest extends FormRequest
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
        $logo = $this->route()->parameters();

        $rules = [
            'name' => 'required|min:2|max:100',
            'type_logo_id' => 'required'
        ];
        if ($logo) {
            $rules = array_merge(
                $rules,
                [
                    'name' => 'required|unique:logos,name,' . (implode($logo)),
                    'type_logo_id' => 'required'
                ]
            );
        }



        return $rules;
    }
}
