<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\Grade;
use App\Http\Requests\admin\GradeRequest;
class GradeController extends Controller
{
    public function  __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth')->except('show');
        $this->middleware('can:notasRapidas.index')->only('index');
        $this->middleware('can:notasRapidas.create')->only('create');
        $this->middleware('can:notasRapidas.edit')->only('edit');
        $this->middleware('can:notasRapidas.destroy')->only('destroy');
    }

    public function index(){
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "Notas Rapidas"],
        ];
        return view('admin.pages.grades.index', compact('breadcrumbs'));
    }
    public function create()
    {
        $grade = Grade::all();
        //dd($logo);
        //$typeLogos = TypeLogo::pluck('name', 'id');
        //dd($typeLogos);
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "logo", 'name' => "Nota rápida"], ['name' => "Registrando nota"],
        ];
        return view('admin.pages.grades.create', compact('breadcrumbs', 'grade'));
    }
    public function store(GradeRequest $request)
    {
        $logo = Grade::create($request->all());
        return redirect()->route('notasRapidas.index')->with('success', 'Nota Rapido registrado correctamente');
    }
    public function show($id)
    {
        abort(403);
    }
    public function edit($id)
    {

        $grades = Grade::latest()->paginate(10);
        $grade = Grade::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "Notas Rapidas", 'name' => "Notas Rapidas"], ['name' => "Editando Notas"],
        ];
        return view('admin.pages.grades.edit', compact('breadcrumbs', 'grades', 'grade'));
    }
    public function update(GradeRequest $request, $id)
    {
        Grade::find($id)->update($request->all());
        return redirect()->route('notasRapidas.index')->with('warning', 'La tématica se modifico correctamente');
    }

    public function destroy($id)
    {
       // $logo = Grade::findOrFail($id);
        Grade::findOrFail($id)->delete();
        return redirect()->route('notasRapidas.index')->with('warning', 'Nota eliminado correctamente');
    }
}
