<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\Youth_policyRequest;
use App\Models\admin\YouthPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
/**
 * @OA\Tag(
 *     name="Política",
 *     description="Endpoints relacionados con los politica-juventud."
 * )
 */
class YouthPolicyController extends Controller
{
    // Para documentación API
    /**
     * @OA\Get(
     *     path="/api/v1/politica-juventud",
     *     summary="Listado de los politica-juventud",
     *     tags={"Política"},
     *     operationId="politica-juventud",
     *     description="Devuelve un listado de los politica-juventud que están registrados en nuestro servidor",
     *     security={{"bearer_token":{}}},
     *       @OA\Parameter(
     *         name="sort",
     *         in="query",
     *         description="Campo por el cual ordenar los resultados. Agregar un signo '-' al principio para orden descendente (ej. -name).",
     *         required=false,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Listado de los politica-juventud obtenido exitosamente.",
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
     *     path="/api/v1/politica-juventud/{id}",
     *     summary="Obtener un politica-juventud por su ID",
     *      tags={"Política"},
     *     operationId="get_politica-juventud_by_id",
     *     description="Devuelve un politica-juventud específico por su ID.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la politica-juventud a obtener.",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="politica-juventud obtenido exitosamente.",
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
     *         description="politica-juventud no encontrado.",
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
        $this->middleware('can:politicaJuvenil.index')->only('index');
        $this->middleware('can:politicaJuvenil.create')->only('create');
        $this->middleware('can:politicaJuvenil.edit')->only('edit');
        $this->middleware('can:politicaJuvenil.destroy')->only('destroy');

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
            ['link' => "home", 'name' => "Inicio"],
            ['name' => "politica juventud"],
        ];
        return view('admin.pages.youthPolicy.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $youthPolicies = YouthPolicy::all();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "politica juventud", 'name' => "Politica Juventud"],
            ['name' => "Registrando Politica Juventud"],
        ];
        return view('admin.pages.youthPolicy.create', compact('breadcrumbs', 'youthPolicies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Youth_policyRequest $request)
    {
        $youthPolicy = YouthPolicy::create($request->all());
        if ($request->file('image_policy')) {
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
            $url = $request->file('image_policy')->store('public/policies');
            $youthPolicy->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('politicaJuvenil.index')->with('success', 'politica juventud registrado correctamente');
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

        $youthPolicies = YouthPolicy::latest()->paginate(10);
        $youthPolicy = YouthPolicy::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "Politica Juventud", 'name' => "Politica Juventud"],
            ['name' => "Editando Politica Juventud"],
        ];
        return view('admin.pages.youthPolicy.edit', compact('breadcrumbs', 'youthPolicies', 'youthPolicy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Youth_policyRequest $request, $id)
    {
        YouthPolicy::find($id)->update($request->all());
        if ($request->file('image_policy')) {
            $url = Storage::put('public/policies', $request->file('image_policy'));
            $youthPolicy = YouthPolicy::findOrFail($id);
            if ($youthPolicy->image) {
                Storage::delete($youthPolicy->image->url);
                $youthPolicy->image->update([
                    'url' => $url
                ]);

            } else {
                $youthPolicy->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('politicaJuvenil.edit', $id)->with('info', 'La Politica Juventud se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $youthPolicy = YouthPolicy::findOrFail($id);

        if (!is_null($youthPolicy->image)) {
            Storage::disk()->delete($youthPolicy->image->url);
            $youthPolicy->image->delete();
            $youthPolicy->Delete();
        } else {
            //$youthPolicy->image->delete();
            $youthPolicy->Delete();
        }
        return redirect()->route('politicaJuvenil.index')->with('warning', 'Politica Juventud eliminado correctamente');
    }
}
