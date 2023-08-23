<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\ThematicRequest;
use App\Models\admin\Thematic;
use Illuminate\Http\Request;

/**
 * @OA\Tag(
 *     name="Temáticas",
 *     description="Endpoints relacionados con los temáticas."
 * )
 */

class ThematicController extends Controller
{
// Para documentación API
/**
 * @OA\Get(
 *     path="/api/v1/tematicas",
 *     summary="Listado de los tematicas",
 *     tags={"Temáticas"},
 *     operationId="tematicas",
 *     description="Devuelve un listado de los tematicas que están registrados en nuestro servidor",
 *     security={{"bearer_token":{}}},
 *     @OA\Parameter(
 *         name="perPage",
 *         in="query",
 *         description="Número de elementos por página en la paginación.",
 *         required=false,
 *         @OA\Schema(type="integer")
 *     ),
 *       @OA\Parameter(
 *         name="sort",
 *         in="query",
 *         description="Campo por el cual ordenar los resultados. Agregar un signo '-' al principio para orden descendente (ej. -name).",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="filter[name]",
 *         in="query",
 *         description="Filtrar los resultados por el título de la temática.",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Parameter(
 *         name="filter[descripcion]",
 *         in="query",
 *         description="Filtrar los resultados por la descripción de la temática.",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *       @OA\Parameter(
 *         name="search",
 *         in="query",
 *         description="Buscar por un término en el nombre o descripcición de la tematica.",
 *         required=false,
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Listado de los tematicas obtenido exitosamente.",
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
 * @OA\Get(
 *     path="/api/v1/tematicas/{id}",
 *     summary="Obtener un tematica por su ID",
 *      tags={"Temáticas"},
 *     operationId="get_tematica_by_id",
 *     description="Devuelve un Temáticas específico por su ID.",
 *     security={{"bearer_token":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         description="ID de la tematica a obtener.",
 *         required=true,
 *         @OA\Schema(type="integer")
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Temáticas obtenido exitosamente.",
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
 *         description="Temáticas no encontrado.",
 *     ),
 *     @OA\Response(
 *         response=500,
 *         description="Error interno del servidor. Algo salió mal.",
 *     ),
 * ),
 */

    public function __construct()
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
        return view('admin.pages.thematic.create', compact('breadcrumbs', 'thematics'));
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
