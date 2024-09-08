<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\About_cmpjRequest;
use App\Models\admin\About_cmpj;
use Illuminate\Http\Request;
/**
 * @OA\Tag(
 *     name="sobre-cmpj",
 *     description="Endpoints relacionados con los sobre-cmpj."
 * )
 */
class About_cmpjController extends Controller
{
    // Para documentación API
    /**
     * @OA\Get(
     *     path="/api/v1/sobre-cmpj",
     *     summary="Listado de los sobre-cmpj",
     *     tags={"sobre-cmpj"},
     *     operationId="sobre-cmpj",
     *     description="Devuelve un listado de los sobre-cmpj que están registrados en nuestro servidor",
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
     *         description="Listado de los sobre-cmpj obtenido exitosamente.",
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
     *     path="/api/v1/sobre-cmpj/{id}",
     *     summary="Obtener un sobre-cmpj por su ID",
     *      tags={"sobre-cmpj"},
     *     operationId="get_sobre-cmpj_by_id",
     *     description="Devuelve un sobre-cmpj específico por su ID.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la sobre-cmpj a obtener.",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="sobre-cmpj obtenido exitosamente.",
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
     *         description="sobre-cmpj no encontrado.",
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Error interno del servidor. Algo salió mal.",
     *     ),
     * ),
     */
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"],
            ['name' => "Lista de Nosotros Observatorio"],
        ];

        return view('admin.pages.aboutCmpj.index', compact('breadcrumbs'));
    }

    public function create()
    {


        //$aboutsObservatory=AdminAboutObservatory::latest()->paginate(5);
        $abouCmpjs = About_cmpj::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "sobreCmpj", 'name' => "CMPJ"],
            ['name' => "Registrando cmpj"],
        ];
        return view('admin.pages.aboutCmpj.create', compact('breadcrumbs', 'abouCmpjs'));
    }

    public function store(About_cmpjRequest $request)
    {//AboutObservatory::create($request->all())
        About_cmpj::create($request->all());
        // die();
        return redirect()->route('sobreCmpj.index')->with('success', 'Registrado correctamente');
    }


    public function edit(About_cmpj $request, $id)
    {
        // $categories = Category::latest()->paginate(5);
        $aboutCmpj = About_cmpj::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"],
            ['link' => "juvenilesObservatorio", 'name' => "Observatorio"],
            ['name' => "Registrando observatorio"],
        ];
        return view('admin.pages.aboutCmpj.edit', compact('breadcrumbs', 'aboutCmpj'));
    }


    public function update(About_cmpjRequest $request, $id)
    {

        About_cmpj::find($id)->update($request->all());
        // $category->update($request->all());
        return redirect()->route('sobreCmpj.index', $id)->with('info', 'Registro actualizado correctamente');
    }


    public function destroy($id)
    {
        // dd($id);
        About_cmpj::findOrFail($id)->delete();
        return redirect()->route('sobreCmpj.index')->with('warning', 'Registro eliminado correctamente');
    }


}
