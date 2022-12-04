<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
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
    public function  __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:roles.permisos.administrar')->only('managePermissions');
        $this->middleware('can:roles.permisos.actualizar')->only('updatePermissions');
        $this->middleware('can:roles.index')->only('index');
        $this->middleware('can:roles.create')->only('create');
        $this->middleware('can:roles.edit')->only(['edit', 'store']);
        $this->middleware('can:roles.destroy')->only('destroy');
        $this->middleware('can:roles.eliminar.definitivo')->only('deleteDefinitive');
        $this->middleware('can:roles.restaurar')->only('restore');
    }
    public function index()
    {
        $roles = Role::latest()->get();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de roles"],
        ];
        // $roles = Role::all();
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
        abort(403);
    }


    /**
     * Show the form for editing the specified resource.
     *
    //  * @param  Spatie\Permission\Models\Role  $role
    //  * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        // dd($role);
        $roles = Role::latest()->paginate(5);
        // $role = Role::findOrFail($role);
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
    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->all());
        return redirect()->route('roles.edit', $role)->with('success', 'Rol actualizado con éxito');
    }
    // Para administrar los permisos de los roles
    public function managePermissions($id)
    {
        $role = Role::findOrFail($id);
        $roles = Role::latest()->paginate(10);
        $permissions = Permission::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "javascript:void(0)", 'name' => "Permisos"], ['name' => "Administrando permisos"],
        ];
        return view('admin.pages.role.permission', compact('breadcrumbs', 'role', 'permissions', 'roles'));
    }
    //Para actualizar el rol y sus permisos
    public function updatePermissions(Request $request, Role $role)
    {
        $role->permissions()->sync($request->permissions);
        return redirect()->back()->with('success', 'Permiso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //Verificamos que rol  no tenga asignado un permiso antes de ser eliminado
        if ($role->permissions()->count()) {
            return redirect()->route('roles.index')->with('error', 'Rol con permisos activos');
        } else {
            $role->delete();
            return redirect()->route('roles.index')->with('success', 'Rol eliminado correctamente');
        }
    }
}
