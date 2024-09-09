<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LogoRequest;
use App\Models\admin\Image;
use App\Models\admin\Logo;
use App\Models\admin\TypeLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
/**
 * @OA\Tag(
 *     name="Logos",
 *     description="Endpoints relacionados con los logos."
 * )
 */
class LogoController extends Controller
{
    // Para documentación API
    /**
     * @OA\Get(
     *     path="/api/v1/logos",
     *     summary="Listado de los logos",
     *     tags={"Logos"},
     *     operationId="logos",
     *     description="Devuelve un listado de los logos que están registrados en nuestro servidor",
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

     *       @OA\Parameter(
     *         name="search",
     *         in="query",
     *         description="Buscar por un término en el nombre o descripcición del logo.",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Listado de los logos obtenido exitosamente.",
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
     *     path="/api/v1/logos/{id}",
     *     summary="Obtener un logo por su ID",
     *      tags={"Logos"},
     *     operationId="get_logo_by_id",
     *     description="Devuelve un logos específico por su ID.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID del logo a obtener.",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="logos obtenido exitosamente.",
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
     *         description="logos no encontrado.",
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
        $this->middleware('can:logos.index')->only('index');
        $this->middleware('can:logos.create')->only('create');
        $this->middleware('can:logos.edit')->only('edit');
        $this->middleware('can:logos.destroy')->only('destroy');
    }

    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"],
            ['name' => "Lista de logo"],
        ];
        return view('admin.pages.logo.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logo = Logo::all();
        //dd($logo);
        $typeLogos = TypeLogo::pluck('name', 'id');
        //dd($typeLogos);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "logo", 'name' => "Logo"],
            ['name' => "Registrando logo"],
        ];
        return view('admin.pages.logo.create', compact('breadcrumbs', 'logo', 'typeLogos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogoRequest $request)
    {
        $logo = Logo::create($request->all());
        if ($request->file('image_logo')) {
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
            $url = $request->file('image_logo')->store('public/logos');
            $logo->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('logos.index')->with('success', 'Logo registrado correctamente');
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
        $typeLogos = TypeLogo::pluck('name', 'id');
        $logos = Logo::latest()->paginate(10);
        $logo = Logo::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "logos", 'name' => "Logos"],
            ['name' => "Editando Logo"],
        ];
        return view('admin.pages.logo.edit', compact('breadcrumbs', 'logos', 'logo', 'typeLogos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LogoRequest $request, $id)
    {
        Logo::find($id)->update($request->all());
        if ($request->file('image_logo')) {
            $url = Storage::put('public/logos', $request->file('image_logo'));
            $logo = Logo::findOrFail($id);
            if ($logo->image) {
                Storage::delete($logo->image->url);
                $logo->image->update([
                    'url' => $url
                ]);

            } else {
                $logo->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('logos.edit', $id)->with('info', 'El logo se actualizo correctamente');
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);

        if (!is_null($logo->image)) {
            Storage::disk()->delete($logo->image->url);
            $logo->image->delete();
            $logo->Delete();
        } else {
            // $logo->image->delete();
            $logo->Delete();
        }
        return redirect()->route('logos.index')->with('warning', 'Logo eliminado correctamente');
    }
}
