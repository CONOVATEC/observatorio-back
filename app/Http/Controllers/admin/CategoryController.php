<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;

class CategoryController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth')->except('show');
        $this->middleware('can:categorias.index')->only('index');
        $this->middleware('can:categorias.create')->only('create');
        $this->middleware('can:categorias.edit')->only('edit');
        $this->middleware('can:categorias.destroy')->only('destroy');
        $this->middleware('can:categorias.eliminar.definitivo')->only('deleteDefinitive');
        $this->middleware('can:categorias.restaurar')->only('restore');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de categorías"],
        ];

        return view('admin.pages.category.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "categorias", 'name' => "Categorías"], ['name' => "Registrando categoría"],
        ];
        return view('admin.pages.category.create', compact('breadcrumbs', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);
        return redirect()->route('categorias.index')->with('success', 'Categoría registrado correctamente');
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
        $categories = Category::latest()->paginate(5);
        $category = Category::findOrFail($id);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "categorias", 'name' => "Categorías"], ['name' => "Editando categoría"],
        ];
        return view('admin.pages.category.edit', compact('breadcrumbs', 'categories', 'category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        // dd($id);
        $category = Category::find($id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description
        ]);
        return redirect()->route('categorias.edit', $id)->with('info', 'Categoría actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->route('categorias.index')->with('warning', 'Categoría eliminado correctamente');
    }
    // Método para restaurar el registro eliminado
    public function restore($id)
    {
        $category = Category::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'Categoría restaurado correctamente');
    }
    // Método para restaurareliminar el registro definitivamente
    public function deleteDefinitive($id)
    {
        $categy = Category::onlyTrashed()->find($id)->forceDelete();
        return redirect()->back()->with('error', 'Categoría eliminado definitivamente');
    }
}
