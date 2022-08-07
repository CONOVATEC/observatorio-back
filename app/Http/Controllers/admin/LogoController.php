<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\LogoRequest;
use App\Models\admin\Image;
use App\Models\admin\Logo;
use App\Models\admin\TypeLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{

    public function  __construct()
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
            ['link' => "home", 'name' => "Inicio"], ['name' => "Lista de logo"],
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
        $typeLogos = TypeLogo::pluck('name', 'id');
        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "logo", 'name' => "Logo"], ['name' => "Registrando logo"],
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
            ['link' => "home", 'name' => "Inicio"], ['link' => "logos", 'name' => "Logos"], ['name' => "Editando Logo"],
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
        if($request->file('image_logo')){
            $url=Storage::put('public/logos',$request->file('image_logo'));
            $logo=Logo::findOrFail($id);
            if($logo->image){
                Storage::delete($logo->image->url);
                $logo->image->update([
                    'url'=>$url
                ]);

            }else{
                $logo->image()->create([
                    'url'=>$url
                ]);
            }
        }

        return redirect()->route('logos.edit', $id)->with('info','El logo se actualizo correctamente');
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);

        if ($logo->image->url) {
            Storage::disk()->delete($logo->image->url);
            $logo->image->delete();
            $logo->Delete();
        } else {
            $logo->image->delete();
            $logo->Delete();
        }
        return redirect()->route('logos.index')->with('warning', 'Logo eliminado correctamente');
    }
}
