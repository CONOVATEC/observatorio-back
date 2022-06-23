<?php

namespace App\Http\Requests\admin;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use App\Actions\Fortify\PasswordValidationRules;

class UserRequest extends FormRequest
{
    use PasswordValidationRules;
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
        return [
            'name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email', 'regex:/(.+)@(.+)\.(.+)/i'],
            'username'  => ['nullable', 'string', 'max:255', 'unique:users,username', 'alpha_dash'],
            'status'  => ['required', 'in:1,2', 'max:1', 'min:1'],
            'phone'     => ['nullable', 'numeric', 'digits:9', 'unique:users,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9'],
            'password' => ['required', Password::min(6)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            'created_at'  => ['required', 'date'],
            'biography'  => ['nullable', 'max:255'],
            'profile_photo_path'  => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=3000,max_height=1300'],
        ];
    }
}