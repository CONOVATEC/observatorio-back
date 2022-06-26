<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\admin\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de usuarios"],
        ];
        return view('admin.pages.user.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::orderby('name')->pluck('name', 'id');
        // $roles = Role::all();
        $users = User::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "users", 'name' => "Usuarios"], ['name' => "Registrando Usuario"],
        ];
        return view('admin.pages.user.create', compact('users', 'breadcrumbs', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = $request->status;
        $user->biography = $request->biography;
        $user->phone = $request->phone;
        if ($request->file('profile_photo_path')) {
            $user->profile_photo_path = $request->file('profile_photo_path')->store('profile-photos');
        }
        $user->save();

        if ($request->file('profile_photo_path')) {
            // resize image to new width
            /************************
             * DISPARAMOS EL EVENTO *
             ************************/
            // StudentSaved::dispatch($user);
            $this->optimizeImage($user); //Método anterior - ejecutar directamente el método para optimizar
        }

        // if ($request->file('profile_photo_path')) {
        //     //Movemos la imagen a la carpeta profiles y guardar la ruta en la variable url
        //     $url = Storage::disk('public')->put('profile-photos', $request->file('profile_photo_path'));
        //     //
        //     //Guardar ruta en la base de datos
        //     $user->profile_photo_path = $url;
        // }
        if ($request->roles) {
            // el metodo attach agrega registros a la tabla
            // $user->roles()->attach($request->roles);
            $user->roles()->sync($request->roles);
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::orderby('name')->pluck('name', 'id');
        $user = User::findOrFail($id);
        // dd($category);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "usuarios", 'name' => "Usuarios"], ['name' => "Editando Usuario"],
        ];
        return view('admin.pages.user.edit', compact('breadcrumbs', 'roles', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        User::find($user->id)->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'biography' => $request->biography,
            'status' => $request->status,
            'phone' => $request->phone,
            'created_at' => $request->created_at,
        ]);
        if ($request->password) {
            $user->update(['password' => bcrypt($request->password)]);
        }
        $user->roles()->sync($request->roles);
        if ($request->hasFile('profile_photo_path')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
                $user->update(['profile_photo_path' => $request->file('profile_photo_path')->store('profile-photos')]);
            } else {
                $user->update(['profile_photo_path' => $request->file('profile_photo_path')->store('profile-photos')]);
            }
        }
        if ($request->file('profile_photo_path')) {
            $this->optimizeImage($user); //ejecutar directamente el método para optimizar
        }
        return redirect()->route('usuarios.edit', $user->id)->with('success', 'Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        //Verificamos que rol  no tenga asignado un permiso antes de ser eliminado
        if ($user->roles()->count()) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario con rol activo');
        } else {
            $user->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
        }
    }
    public function profile(Request $request)
    {
        return view('profile.show', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
    /****************************************************
     * Para optmizimar imagen antes de subir a servidor *
     ****************************************************/
    public function optimizeImage($user)
    {
        /* Ruta del imagen guardado */
        $img = Image::make(Storage::get($user->profile_photo_path));
        $img->widen(600)
            ->limitColors(255)
            ->encode();
        /* Actualizamos con la imagen optimizada */
        Storage::disk('public')->put($user->profile_photo_path, (string) $img);
    }
}