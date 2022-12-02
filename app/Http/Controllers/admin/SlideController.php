<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SlideRequest;
use App\Models\admin\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
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
    $this->middleware('can:slide.index')->only('index');
    $this->middleware('can:slide.create')->only('create');
     $this->middleware('can:slide.edit')->only('edit');
    $this->middleware('can:slide.destroy')->only('destroy');

    }

    public function index()
    {

        $breadcrumbs = [
            // ['link' => "home", 'name' => "inicio"], ['name' => "noticias"]
            ['link' => "home", 'name' => "Inicio"], ['name' => "slider politica juventud"],
        ];
        return view('admin.pages.slide.index', compact('breadcrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slides = Slide::all();

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "slider politica juventud", 'name' => "Politica Juventud"], ['name' => "Registrando Politica Juventud"],
        ];
        return view('admin.pages.slide.create', compact('breadcrumbs', 'slides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SlideRequest $request)
    {
        $slide = Slide::create($request->all());
        if ($request->file('image_slide')) {
            //$url=Storage::put('news',$request->file('file')->store('public/news'));
            $url = $request->file('image_slide')->store('public/slides');
            $slide->image()->create([
                'url' => $url
            ]);
        }
        return redirect()->route('slide.index')->with('success', 'slide politica juventud registrado correctamente');
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
        $slides = Slide::latest()->paginate(10);
        $slide = Slide::findOrFail($id);

        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "Slide Politica Juventud", 'name' => "Slide Politica Juventud"], ['name' => "Editando Slide Politica Juventud"],
        ];
        return view('admin.pages.slide.edit', compact('breadcrumbs', 'slides', 'slide'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SlideRequest $request, $id)
    {
        Slide::find($id)->update($request->all());
        if($request->file('image_slide')){
            $url=Storage::put('public/slides',$request->file('image_slide'));
            $slide=Slide::findOrFail($id);
            if($slide->image){
                Storage::delete($slide->image->url);
                $slide->image->update([
                    'url'=>$url
                ]);

            }else{
                $slide->image()->create([
                    'url'=>$url
                ]);
            }
        }

        return redirect()->route('slide.edit', $id)->with('info','Slide Politica Juventud se actualizo correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slide::findOrFail($id);

        if (!is_null($slide->image)) {
            Storage::disk()->delete($slide->image->url);
            $slide->image->delete();
            $slide->Delete();
        } else {
           // $slide->image->delete();
            $slide->Delete();
        }
        return redirect()->route('slide.index')->with('warning', 'Slide Politica Juventud eliminado correctamente');
    }
}
