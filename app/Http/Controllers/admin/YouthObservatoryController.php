<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\YouthObservatoryRequest;
use App\Models\admin\YouthObservatory;
use Illuminate\Support\Facades\Storage;
/**
 * @OA\Tag(
 *     name="sobre-observatorio",
 *     description="Endpoints relacionados con los sobre-observatorio."
 * )
 */
class YouthObservatoryController extends Controller
{
    // Para documentación API
    /**
     * @OA\Get(
     *     path="/api/v1/sobre-observatorio",
     *     summary="Listado de los sobre-observatorio",
     *     tags={"sobre-observatorio"},
     *     operationId="sobre-observatorio",
     *     description="Devuelve un listado de los sobre-observatorio que están registrados en nuestro servidor",
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
     *         description="Listado de los sobre-observatorio obtenido exitosamente.",
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
     *     path="/api/v1/sobre-observatorio/{id}",
     *     summary="Obtener un sobre-observatorio por su ID",
     *      tags={"sobre-observatorio"},
     *     operationId="get_sobre-observatorio_by_id",
     *     description="Devuelve un sobre-observatorio específico por su ID.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la sobre-observatorio a obtener.",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="sobre-observatorio obtenido exitosamente.",
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
     *         description="sobre-observatorio no encontrado.",
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
        $this->middleware('can:observatorioJuvenil.index')->only('index');
        $this->middleware('can:observatorioJuvenil.create')->only('create');
        $this->middleware('can:observatorioJuvenil.edit')->only('edit');
        $this->middleware('can:observatorioJuvenil.destroy')->only('destroy');

    }

    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"],
            ['name' => "Lista de Observatorio Juvenil"],
        ];

        return view('admin.pages.youthObservatory.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $youthObservatories = YouthObservatory::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "observatorio juvenil", 'name' => "Observatorio Juvenil"],
            ['name' => "Registrando observatorio juvenil"],
        ];
        return view('admin.pages.youthObservatory.create', compact('breadcrumbs', 'youthObservatories'));
    }

    public function store(YouthObservatoryRequest $request)
    {
        $youthObservatory = YouthObservatory::create($request->all());
        if ($request->file('image_observatory')) {
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
            $url = $request->file('image_observatory')->store('public/observatories');
            $youthObservatory->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('observatorioJuvenil.index')->with('success', 'observatorio juvenil registrado correctamente');

    }
    public function show($id)
    {
        abort(403);
    }
    public function edit(YouthObservatory $request, $id)
    {
        $youthObservatories = YouthObservatory::latest()->paginate(10);
        $youthObservatory = YouthObservatory::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "Observatorio Juvenil", 'name' => "Observatorio Juvenil"],
            ['name' => "Editando Observatorio Juvenil"],
        ];
        return view('admin.pages.youthObservatory.edit', compact('breadcrumbs', 'youthObservatories', 'youthObservatory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(YouthObservatoryRequest $request, $id)
    {

        YouthObservatory::find($id)->update($request->all());
        if ($request->file('image_observatory')) {
            $url = Storage::put('public/observatories', $request->file('image_observatory'));
            $youthObservatory = YouthObservatory::findOrFail($id);
            if ($youthObservatory->image) {
                Storage::delete($youthObservatory->image->url);
                $youthObservatory->image->update([
                    'url' => $url
                ]);

            } else {
                $youthObservatory->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('observatorioJuvenil.edit', $id)->with('info', 'El Observatorio Juvenil se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $youthObservatory = YouthObservatory::findOrFail($id);

        if (!is_null($youthObservatory->image)) {
            Storage::disk()->delete($youthObservatory->image->url);
            $youthObservatory->image->delete();
            $youthObservatory->Delete();
        } else {
            // $slide->image->delete();
            $youthObservatory->Delete();
        }
        return redirect()->route('observatorioJuvenil.index')->with('warning', 'el Observatorio Juvenil se elimino correctamente');
    }
}
