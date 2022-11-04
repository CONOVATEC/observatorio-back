<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PositionRequest;
use App\Models\admin\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth')->except('show');
        $this->middleware('can:posiciones.index')->only('index');
        $this->middleware('can:posiciones.create')->only('create');
        $this->middleware('can:posiciones.edit')->only('edit');
        $this->middleware('can:posiciones.destroy')->only('destroy');
        $this->middleware('can:posiciones.eliminar.definitivo')->only('deleteDefinitive');
        $this->middleware('can:posiciones.restaurar')->only('restore');
    }

    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de posiciones"],
        ];
        return view('admin.pages.position.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $positions = Position::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "posiciones", 'name' => "Posiciones"], ['name' => "Registrando puesto"],
        ];
        return view('admin.pages.position.create', compact('breadcrumbs', 'positions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PositionRequest $request)
    {
        Position::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect()->route('posiciones.index')->with('success', 'Puesto registrado correctamente');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $positions = Position::latest()->paginate(5);
        $position = Position::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "posiciones", 'name' => "posiciones"], ['name' => "Editando puesto"],
        ];
        return view('admin.pages.position.edit', compact('breadcrumbs', 'positions', 'position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PositionRequest $request, $id)
    {
        // dd($id);

        Position::find($id)->update(
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name)

            ]);

        // $category->update($request->all());
       return redirect()->route('posiciones.edit', $id)->with('info', 'Posicion actualizado correctamente');
        //return redirect()->route('etiquetas.index');
        //return view('admin.pages.tag.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        Position::findOrFail($id)->delete();
        return redirect()->route('posiciones.index')->with('warning', 'Posicion eliminado correctamente');
    }


    // Método para restaurar el registro eliminado
    public function restore($id)
    {
        $position = Position::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Posicion restaurado correctamente');
    }
    // Método para restaurareliminar el registro definitivamente
    public function deleteDefinitive($id)
    {
        $positions = Position::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('warning', 'Posicion eliminado definitivamente');
    }

}
