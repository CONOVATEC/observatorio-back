<?php

namespace App\Http\Responses;

use Laravel\Fortify\Fortify;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;

class RegisterResponse implements RegisterResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function toResponse($request)
    {
        // Consultamos los roles del usuarios auténtificado
        $roles = auth()->user()->getRoleNames();
        // Si tiene rol entra al ciclo
        if (count($roles) > 0) {
            foreach ($roles as $key => $rol) {
                switch ($rol) {
                    case 'Super Administrador':
                        $home = "/home";
                        return redirect($home);
                        break;
                    case 'Administrador':
                        $home = "/usuarios";
                        return redirect($home);
                        break;
                    case 'Editor':
                        $home = "/noticias";
                        return redirect($home);
                        break;
                    case 'Colaborador':
                        // {{ route('usuarios.show',Auth::user()->id) }}
                        $home = "usuarios/" . Auth::user()->id;
                        return redirect($home);
                        break;
                    default:
                        $home = "usuarios/" . Auth::user()->id;
                        return redirect($home);
                        break;
                }
            }
        } else {
            $home = "usuarios/" . Auth::user()->id;
            return redirect($home);
        }
    }
}