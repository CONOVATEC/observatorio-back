<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
       public function index()
       {
              $breadcrumbs = [
                     // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
                     ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de usuarios"],
              ];
              return view('admin.pages.user.index', compact('breadcrumbs'));
       }
       public function profile(Request $request)
       {
              return view('profile.show', [
                     'request' => $request,
                     'user' => $request->user(),
              ]);
       }
}