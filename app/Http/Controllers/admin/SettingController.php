<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SettingRequest;
use App\Models\admin\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
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
            ['link' => "home", 'name' => "Inicio"], ['name' => "configuraciones de la web"],
        ];

        return view('admin.pages.setting.index', compact('breadcrumbs'));
    }


    public function store(SettingRequest $request)
    {
        Setting::create($request->all());
        return redirect()->route('configuraciones.index')->with('success', 'Configuracion registrado correctamente');
    }


    public function edit($id)
    {
        $settings = Setting::latest()->paginate(5);
        $setting = Setting::findOrFail($id);
        // dd($category);

        $breadcrumbs = [
            ['link' => "home", 'name' => "Inicio"], ['link' => "configuraciones", 'name' => "Configuraciones"], ['name' => "Editando configuraciones de la web"],
        ];
        return view('admin.pages.setting.edit', compact('breadcrumbs', 'settings', 'setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {

        $setting=Setting::findOrFail($id);
        Setting::find($setting->id)->update([
            'name_entity' => $request->name_entity,
            'link_facebook' => $request->link_facebook,
            'link_instagram' => $request->link_instagram,
            'link_linkedin' => $request->link_linkedin,
            'link_youtube' => $request->link_youtube,
            'user_id'=>auth()->id()
        ]);
        // actualizar imagen
        if ($request->hasFile('logo')) {
            if ($setting->logo) {
                Storage::disk('public')->delete($setting->logo);
                $setting->update(['logo' => $request->file('logo')->store('profile-logos')]);
            } else {
                $setting->update(['logo' => $request->file('logo')->store('profile-logos')]);
            }
        }
        if ($request->file('logo')) {
            $this->optimizeImage($setting); //ejecutar directamente el método para optimizar
        }




  return redirect()->route('configuraciones.edit', $id)->with('info', 'La configuracion se actualizo correctamente');
    }

      /****************************************************
     * Para optmizimar imagen antes de subir a servidor *
     ****************************************************/
    public function optimizeImage($setting)
    {
        /* Ruta del imagen guardado */
        $img = Image::make(Storage::get($setting->logo));
        $img->widen(600)
            ->limitColors(255)
            ->encode();
        /* Actualizamos con la imagen optimizada */
        Storage::disk('public')->put($setting->logo, (string) $img);
    }

}
