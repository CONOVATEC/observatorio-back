<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Http\Requests\admin\CategoryResquest;

class CategoryController extends Controller
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
        return view('admin.pages.category.create', compact('breadcrumbs','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());
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
        //
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
        // dd($category);


            $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "categorias", 'name' => "Categorías"], ['name' => "Editando categoría"],
        ];
        return view('admin.pages.category.edit', compact('breadcrumbs','categories','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request,$id)
    {
        // dd($id);
        Category::find($id)->update($request->all());
        // $category->update($request->all());
        return redirect()->route('categorias.index')->with('info', 'Categoría Actualizado correctamente');
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
        Category::find($id)->delete();
        return redirect()->route('categorias.index')->with('error', 'Categoría eliminado correctamente');
    }
}