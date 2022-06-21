<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
       
        $post = $this->route()->parameters();
        $rules= [
            'title'=>'required|min:3|max:255',
            'slug'=>'required',
            'status'=>'required|in:1,2',
            
        ];
        if($this->status==2){
            $rules=array_merge($rules,[
                'extract'=>'required|min:3|max:255',
                'content'=>'required|min:3|max:255',
                'tendencia_active'=>'required',
                'category_id'=>'required',
                'tags'=>'required'
                
            ]
        );
        }
        return $rules;
    }
}
