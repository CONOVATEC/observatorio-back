<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // home
    public function dashboard()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['name' => "Dashboard"]
        ];
        return view('admin.pages.dashboard.index', compact('breadcrumbs'));
    }
}