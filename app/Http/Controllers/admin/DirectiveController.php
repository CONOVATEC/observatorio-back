<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\DirectiveRequest;
use App\Models\admin\Image;
use App\Models\admin\Directive;
use App\Models\admin\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
/**
 * @OA\Tag(
 *     name="Directiva",
 *     description="Endpoints relacionados con los directiva."
 * )
 */
class DirectiveController extends Controller
{
    // Para documentación API
    /**
     * @OA\Get(
     *     path="/api/v1/directiva",
     *     summary="Listado de los directiva",
     *     tags={"Directiva"},
     *     operationId="directiva",
     *     description="Devuelve un listado de los directiva que están registrados en nuestro servidor",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="perPage",
     *         in="query",
     *         description="Número de elementos por página en la paginación.",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="included",
     *         in="query",
     *         description="Relaciones que se deben incluir en la respuesta (position, image). Separadas por comas.",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *       @OA\Parameter(
     *         name="sort",
     *         in="query",
     *         description="Campo por el cual ordenar los resultados. Agregar un signo '-' al principio para orden descendente (ej. -name).",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="filter[id]",
     *         in="query",
     *         description="Filtrar los resultados por el ID del directiva.",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="filter[name]",
     *         in="query",
     *         description="Filtrar los resultados por el nombre del directiva.",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Listado de los directiva obtenido exitosamente.",
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
     *     path="/api/v1/directiva/{id}",
     *     summary="Obtener un directiva por su ID",
     *      tags={"Directiva"},
     *     operationId="get_directiva_by_id",
     *     description="Devuelve un directiva específico por su ID.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del directiva a obtener.",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="directiva obtenido exitosamente.",
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
     *         description="directiva no encontrado.",
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
        $this->middleware('can:directives.index')->only('index');
        $this->middleware('can:directives.create')->only('create');
        $this->middleware('can:directives.edit')->only('edit');
        $this->middleware('can:directives.destroy')->only('destroy');
    }
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"],
            ['name' => "Lista de Directivos"],
        ];
        return view('admin.pages.directive.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $directive = Directive::all();
        //dd($directive);
        $position_id = Position::pluck('slug', 'id');
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "directives", 'name' => "Directivo"],
            ['name' => "Registrando Directivo"],
        ];
        return view('admin.pages.directive.create', compact('breadcrumbs', 'directive', 'position_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DirectiveRequest $request)
    {
        //dd($request);
        $directive = Directive::create($request->all());

        if ($request->file('image_directive')) {
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
            $url = $request->file('image_directive')->store('public/directives');
            $directive->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('directives.index')->with('success', 'Directivo registrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $position_id = Position::pluck('name', 'id');
        $directives = Directive::latest()->paginate(10);
        $directive = Directive::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "Directivos", 'name' => "Directivos"],
            ['name' => "Editando Directivo"],
        ];
        return view('admin.pages.directive.edit', compact('breadcrumbs', 'directives', 'directive', 'position_id'));
    }

    public function show($id)
    {
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DirectiveRequest $request, $id)
    {
        Directive::find($id)->update($request->all());
        if ($request->file('image_directive')) {
            $url = Storage::put('public/directives', $request->file('image_directive'));
            $directive = Directive::findOrFail($id);
            if ($directive->image) {
                Storage::delete($directive->image->url);
                $directive->image->update([
                    'url' => $url
                ]);

            } else {
                $directive->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('directives.edit', $id)->with('info', 'El Directivo se actualizo correctamente');
    }

    public function destroy($id)
    {
        $directive = Directive::findOrFail($id);

        if (!is_null($directive->image->url)) {
            Storage::disk()->delete($directive->image->url);
            $directive->image->delete();
            $directive->Delete();
        } else {
            $directive->Delete();
        }
        return redirect()->route('directives.index')->with('warning', 'Directivo eliminado correctamente');
    }
}
