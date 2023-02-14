<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ThematicRequest;
use App\Models\admin\Thematic;
use Illuminate\Http\Request;

class ThematicController extends Controller
{

    public function  __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth')->except('show');
        $this->middleware('can:tematica.index')->only('index');
        $this->middleware('can:tematica.create')->only('create');
        $this->middleware('can:tematica.edit')->only('edit');
        $this->middleware('can:tematica.destroy')->only('destroy');
    }

    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de tematica"],
        ];
        return view('admin.pages.thematic.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $thematics = Thematic::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "tematica", 'name' => "tematica"], ['name' => "Registrando nueva tematica"],
        ];
        return view('admin.pages.thematic.create', compact('breadcrumbs','thematics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThematicRequest $request)
    {
        Thematic::create($request->all());
        return redirect()->route('tematica.index')->with('success', 'Tematica registrada correctamente');
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
    public function edit($id)
    {
        $thematics = Thematic::latest()->paginate(5);
        $thematic = Thematic::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "tematica", 'name' => "Tematicas"], ['name' => "Editando tematica"],
        ];
        return view('admin.pages.thematic.edit', compact('breadcrumbs', 'thematics', 'thematic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ThematicRequest $request, $id)
    {
        Thematic::find($id)->update($request->all());
        // $category->update($request->all());
       return redirect()->route('tematica.edit', $id)->with('info', 'Tematica actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Thematic::findOrFail($id)->delete();
        return redirect()->route('tematica.index')->with('warning', 'Tematica eliminado correctamente');
    }
}
