<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\About_cmpjRequest;
use App\Models\admin\About_cmpj;
use Illuminate\Http\Request;

class About_cmpjController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de Nosotros Observatorio"],
        ];

        return view('admin.pages.aboutCmpj.index', compact('breadcrumbs'));
    }

    public function create()
    {
        
       
        //$aboutsObservatory=AdminAboutObservatory::latest()->paginate(5);
        $abouCmpjs=About_cmpj::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "sobreCmpj", 'name' => "CMPJ"], ['name' => "Registrando cmpj"],
        ];
        return view('admin.pages.aboutCmpj.create', compact('breadcrumbs','abouCmpjs'));
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
            ['link' => "home", 'name' => "Inicio"], ['link' => "juvenilesObservatorio", 'name' => "Observatorio"], ['name' => "Registrando observatorio"],
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
