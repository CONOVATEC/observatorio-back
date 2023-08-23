<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CategoryRequest;
use App\Models\admin\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * @OA\Tag(
 *     name="Categorías",
 *     description="Endpoints relacionados con las Categorías."
 * )
 */

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/v1/categories",
     *     summary="Listado de las Categorías",
     *     tags={"Categorías"},
     *     operationId="categories",
     *     description="Devuelve un listado de las Categorías que están registradas en nuestro servidor",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Número de elementos por página en la paginación.",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="sort",
     *         in="query",
     *         description="Campo por el cual ordenar los resultados. Agregar un signo '-' al principio para orden descendente (ej. -name).",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="filter[name]",
     *         in="query",
     *         description="Filtrar los resultados por el nombre de la categoría.",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="filter[description]",
     *         in="query",
     *         description="Filtrar los resultados por la descripción de la categoría.",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Buscar por un término en el nombre o la descripción de la categoría.",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="included",
     *         in="query",
     *         description="Relaciones que se deben incluir en la respuesta (posts). Separadas por comas.",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Listado de las Categorías obtenido exitosamente.",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No autorizado. Se requiere un token válido en el encabezado.",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Token no provisto. Se requiere un token en el encabezado.",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error interno del servidor. Algo salió mal.",
     *     ),
     * )
     *
     * @OA\Get(
     *     path="/api/v1/categories/{id}",
     *     summary="Obtener una Categoría por su ID",
     *     tags={"Categorías"},
     *     operationId="get_category_by_id",
     *     description="Devuelve una Categoría específica por su ID.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la Categoría a obtener.",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Categoría obtenida exitosamente.",
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="No autorizado. Se requiere un token válido en el encabezado.",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Token no provisto. Se requiere un token en el encabezado.",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Categoría no encontrada.",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error interno del servidor. Algo salió mal.",
     *     ),
     * )
     */

    public function __construct()
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
            'description' => $request->description,
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
            'description' => $request->description,
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
