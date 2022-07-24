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
        if($this->user_id == auth()->user()->id){
            return true;
        }else{
            return false;
        }

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
            'slug'=>'required|unique:posts',
            'status'=>'required|in:1,2',
            'file'=>'image'

        ];
        if($post){
            $rules['slug']='required|unique:posts,slug,'.(implode($post));
        }
        if($this->status==2){
            $rules=array_merge($rules,[
                'extract'=>'required|min:3',
                'content'=>'required|min:3',
                'tendencia_active'=>'required',
                'category_id'=>'required',
                'tags'=>'required',

                'file'=>'image'
               
                

            ]
        );
        }
        return $rules;
    }
}
