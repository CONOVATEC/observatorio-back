<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class YouthStrategyRequest extends FormRequest
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
        $rules = [
            'name' => 'required|min:3|string',
            'link_youtube'=>'nullable|min:3|string',
            'link_drive'=>'nullable|min:3|string',
        ];
        return $rules;
    }
}
