<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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

        $slide = $this->route()->parameters();

        $rules = [
            'year'=>'min:4|max:4',
            'title'=>'min:3|max:255|unique:slides',
            'extract'=>'min:3|max:250',
            'status'=>'required|in:1,2'

        ];
        if ($slide) {
          $rules = array_merge(
            $rules,
        [
            'year' => 'min:4|max:4',
            'title'=>'min:3|max:255|unique:slides,title,' .(implode($slide)),
            'extract'=>'min:3|max:250',
            'status'=>'required|in:1,2'
        ]);
        }
        return  $rules;
    }


}

