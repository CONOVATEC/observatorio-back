<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
       public function index()
       {

       }
       public function profile(Request $request)
       {
       return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);

       }
}