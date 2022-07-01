<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\RoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de roles"],
        ];
        $roles = Role::all();
        return view('admin.pages.role.index', compact('roles', 'breadcrumbs'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "roles", 'name' => "Roles"], ['name' => "Registrando rol"],
        ];
        return view('admin.pages.role.create', compact('roles', 'breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        // dd($request->all());
        $role = Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'Rol registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function edit(Role $role)
    {
        dd($role);
        $roles = Role::latest()->paginate(5);
        $role = Role::findOrFail($role);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "roles", 'name' => "Roles"], ['name' => "Editando Rol"],
        ];
        return view('admin.pages.role.edit', compact('breadcrumbs', 'roles', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}