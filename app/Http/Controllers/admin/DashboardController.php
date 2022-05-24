<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
        // home
    public function dashboard()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['name' => "Dashboard"]
        ];
        return view('admin.pages.dashboard.index', ['breadcrumbs' => $breadcrumbs]);
    }

}