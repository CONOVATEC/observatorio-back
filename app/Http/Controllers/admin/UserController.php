<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\admin\Post;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Spatie\Activitylog\Models\Activity;
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
        $usersAll = User::all();
        $usersActive = User::where(['status' => '2']);
        $usersInactive = User::where(['status' => '1']);
        $usersEliminated = User::onlyTrashed()->get();
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de usuarios"],
        ];
        // activity()->log('');
        return view('admin.pages.user.index', compact('breadcrumbs', 'usersAll', 'usersActive', 'usersInactive', 'usersEliminated'));
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
            ['link' => "home", 'name' => "Inicio"], ['link' => "usuarios", 'name' => "Usuarios"], ['name' => "Registrando Usuario"],
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
            $name = 'usuario-' . date('dmYHi') . '-' . $request->file('profile_photo_path')->getClientOriginalName();
            $user->profile_photo_path = $request->file('profile_photo_path')->storeAs('profile-photos', $name);
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

        if ($request->roles) {
            // el metodo attach agrega registros a la tabla
            // $user->roles()->attach($request->roles);
            $user->roles()->sync($request->roles);
        } else {
            // Asignamos el rol de Colaborador como predeterminado al registrar
            $roles = $user->getRoleNames();
            if (is_null($roles)) {
                $user->roles()->attach(Role::where('name', 'Colaborador')->first());
            } else {
                $user->roles()->sync($request->roles);
            }
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
        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->paginate(3);
        $activities = Activity::causedBy($user)->orderBy('created_at', 'desc')->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "usuarios", 'name' => "Usuarios"], ['name' => "Perfil de Usuario"],
        ];
        return view('admin.pages.profile.show', compact('user', 'breadcrumbs', 'activities', 'posts'));
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
        // dd(is_null($request->roles));
        if ($request->roles != null) {
            // el metodo attach agrega registros a la tabla
            $user->roles()->sync($request->roles);
        } else {
            $user->syncRoles([]); //Limpiamos otros roles antes de proceder
            $user->roles()->attach(Role::where('name', 'Colaborador')->first());
        }
        if ($request->hasFile('profile_photo_path')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
                $name = 'usuario-' . date('dmYHi') . '-' . $request->file('profile_photo_path')->getClientOriginalName();
                $user->update(['profile_photo_path' => $request->file('profile_photo_path')->storeAs('profile-photos', $name)]);
            } else {
                $name = 'usuario-' . date('dmYHi') . '-' . $request->file('profile_photo_path')->getClientOriginalName();
                $user->update(['profile_photo_path' => $request->file('profile_photo_path')->storeAs('profile-photos', $name)]);
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
        // dd($user->posts()->count());
        if ($user->posts()->count()) {
            return redirect()->route('usuarios.index')->with('error', 'Usuario tiene publicaciones activas');
        } else {
            $user->delete();
            return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
        }
    }
    public function updateProfile(Request $request)
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
    // Método para restaurar el registro eliminado
    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id)->restore();
        return redirect()->back()->with('success', 'Usuario restaurado correctamente');
    }
    // Método para restaurareliminar el registro definitivamente
    public function deleteDefinitive($id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        if ($user->profile_photo_path) {
            Storage::disk('public')->delete($user->profile_photo_path);
            $user->forceDelete();
            return redirect()->back()->with('warning', 'Usuario eliminado definitivamente');
        } else {
            // $user = User::onlyTrashed()->findOrFail($id)->forceDelete();
            $user->forceDelete();
            return redirect()->back()->with('warning', 'Usuario eliminado definitivamente');
        }
    }
}