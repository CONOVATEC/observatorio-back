<?php

namespace App\Http\Responses;

use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        $user = Auth::User()->whereHas("roles", function ($q) {
            $q->where("name", "Administrador");
        })->get();
        // dd($user);

        if ($user) {
            $home = "/home";
            return redirect($home);
        } else {
            $home = "/usuarios/perfil";
            return redirect($home);
        }
        // $home = $user == 'Colaborador' ? '/usuarios/perfil' : '/configuracion/empresa';
        // return redirect($home);
    }
}