<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\YouthObservatoryRequest;
use App\Models\admin\YouthObservatory;
use Illuminate\Support\Facades\Storage;

class YouthObservatoryController extends Controller
{

    public function  __construct()
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
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de Observatorio Juvenil"],
        ];

        return view('admin.pages.youthObservatory.index', compact('breadcrumbs'));
    }

    public function create()
    {
        $youthObservatories=YouthObservatory::all();
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "observatorio juvenil", 'name' => "Observatorio Juvenil"], ['name' => "Registrando observatorio juvenil"],
        ];
        return view('admin.pages.youthObservatory.create', compact('breadcrumbs','youthObservatories'));
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
            ['link' => "home", 'name' => "Inicio"], ['link' => "Observatorio Juvenil", 'name' => "Observatorio Juvenil"], ['name' => "Editando Observatorio Juvenil"],
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
        if($request->file('image_observatory')){
            $url=Storage::put('public/observatories',$request->file('image_observatory'));
            $youthObservatory=YouthObservatory::findOrFail($id);
            if($youthObservatory->image){
                Storage::delete($youthObservatory->image->url);
                $youthObservatory->image->update([
                    'url'=>$url
                ]);

            }else{
                $youthObservatory->image()->create([
                    'url'=>$url
                ]);
            }
        }

        return redirect()->route('observatorioJuvenil.edit', $id)->with('info','El Observatorio Juvenil se actualizo correctamente');
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
