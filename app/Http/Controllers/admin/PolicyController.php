<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\YouthPolicy;
use Illuminate\Http\Request;
use SebastianBergmann\Complexity\CyclomaticComplexityCalculatingVisitor;

class PolicyController extends Controller
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
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de Políticas"],
        ];

        return view('admin.pages.policy.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $policies = YouthPolicy::latest()->paginate(5);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "politicas", 'name' => "Políticas"], ['name' => "Registrando políticas"],
        ];
        return view('admin.pages.policy.create', compact('breadcrumbs', 'policies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        YouthPolicy::create($request->all());
        return redirect()->route('politicas.index')->with('success', 'Política registrada correctamente');
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
    public function edit($id)
    {
        $policies = YouthPolicy::latest()->paginate(5);
        $policy = YouthPolicy::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "politicas", 'name' => "Políticas"], ['name' => "Editando categoría"],
        ];
        return view('admin.pages.policy.edit', compact('breadcrumbs', 'policies', 'policy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        YouthPolicy::find($id)->update($request->all());
        // $category->update($request->all());
        return redirect()->route('politicas.edit', $id)->with('info', 'Políitica actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        YouthPolicy::findOrFail($id)->delete();
        return redirect()->route('politicas.index')->with('warning', 'Política eliminada correctamente');
    }
}
