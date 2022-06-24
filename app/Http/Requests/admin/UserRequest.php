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
        // Verificamos que en la ruta trae un parámetro
        $usuario = implode($this->route()->parameters('usuario'));
        $rules = [
            'name' => ['required', 'max:255', 'regex:/^[A-Za-zÁÉÍÓÚáéíóúñÑ ]+$/'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email', 'regex:/(.+)@(.+)\.(.+)/i'],
            'username'  => ['nullable', 'string', 'max:255', 'unique:users,username', 'alpha_dash'],
            'status'  => ['required', 'in:1,2', 'max:1', 'min:1'],
            'roles'  => ['nullable', 'array', 'min:1'],
            // 'roles.*'  => ['required', 'array', 'distinct'],
            'phone'     => ['nullable', 'numeric', 'digits:9', 'unique:users,phone', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9'],
            'password' => ['required', Password::min(6)->mixedCase()->letters()->numbers()->symbols()->uncompromised()],
            'created_at'  => ['nullable', 'date'],
            'biography'  => ['nullable', 'min:1'],
            'profile_photo_path'  => ['nullable', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:2048', 'dimensions:min_width=100,min_height=100,max_width=3000,max_height=1300'],
        ];
        if ($usuario) {
            $rules['email'] = ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email,' . $usuario, 'regex:/(.+)@(.+)\.(.+)/i'];
            $rules['username'] = ['nullable', 'string', 'max:255', 'unique:users,username,' . $usuario, 'alpha_dash'];
            // $rules['roles'] = ['required', 'array', 'min:1'];
            $rules['phone']     = ['nullable', 'numeric', 'digits:9', 'unique:users,phone,' . $usuario, 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:9'];
            $rules['password'] = ['nullable', Password::min(6)->mixedCase()->letters()->numbers()->symbols()->uncompromised()];

            // $rules['name'] = 'required|unique:categories,name,' . (implode($usuario));
        }
        return  $rules;
    }
    public function message()
    {
        return  [
            //en proceso no funciona aún
            'name.required' => 'Es necesario tus datos sean correctamente | No se permite números',
        ];
    }
}