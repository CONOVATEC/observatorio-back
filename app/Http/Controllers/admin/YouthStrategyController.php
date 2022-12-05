<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\YouthStrategyRequest;
use App\Models\admin\YouthStrategy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class YouthStrategyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function  __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth')->except('show');
        $this->middleware('can:estrategiaMetropolitana.index')->only('index');
        $this->middleware('can:estrategiaMetropolitana.create')->only('create');
        $this->middleware('can:estrategiaMetropolitana.edit')->only('edit');
        $this->middleware('can:estrategiaMetropolitana.destroy')->only('destroy');

    }
    public function index()
    {
        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "estrategia metropolitana"],
        ];
        return view('admin.pages.youthStrategy.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $youthStrategies = YouthStrategy::all();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "estrategia metropolitana", 'name' => "Estrategia Metropolitana"], ['name' => "Registrando Estrategia Metropolitana"],
        ];
        return view('admin.pages.youthStrategy.create', compact('breadcrumbs', 'youthStrategies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(YouthStrategyRequest $request)
    {
        $youthStrategy = YouthStrategy::create($request->all());
        if ($request->file('image_strategy')) {
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
            $url = $request->file('image_strategy')->store('public/strategies');
            $youthStrategy->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('estrategiaMetropolitana.index')->with('success', 'estrategia metropolitana registrado correctamente');
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
        $youthStrategies = YouthStrategy::latest()->paginate(10);
        $youthStrategy = YouthStrategy::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "Estrategia Metropolitana", 'name' => "Estrategia Metropolitana"], ['name' => "Editando Estrategia Metropolitana"],
        ];
        return view('admin.pages.youthStrategy.edit', compact('breadcrumbs', 'youthStrategies', 'youthStrategy'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(YouthStrategyRequest $request, $id)
    {
        YouthStrategy::find($id)->update($request->all());
        if($request->file('image_strategy')){
            $url=Storage::put('public/strategies',$request->file('image_strategy'));
            $youthStrategy=YouthStrategy::findOrFail($id);
            if($youthStrategy->image){
                Storage::delete($youthStrategy->image->url);
                $youthStrategy->image->update([
                    'url'=>$url
                ]);

            }else{
                $youthStrategy->image()->create([
                    'url'=>$url
                ]);
            }
        }

        return redirect()->route('estrategiaMetropolitana.edit', $id)->with('info','La Estrategia Metropolitana se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $youthStrategy = YouthStrategy::findOrFail($id);

        if (!is_null($youthStrategy->image)) {
            Storage::disk()->delete($youthStrategy->image->url);
            $youthStrategy->image->delete();
            $youthStrategy->Delete();
        } else {
            //$youthPolicy->image->delete();
            $youthStrategy->Delete();
        }
        return redirect()->route('estrategiaMetropolitana.index')->with('warning', 'Estrategia Metropolitana eliminada correctameStrategy');
    }
}
