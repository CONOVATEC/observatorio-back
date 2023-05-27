{{-- <form action="javascript:void(0);" class="form"> --}}
<div class="row">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <div class="row">

        <div class="col-8">
            <div class="mb-2">
                {{-- 'required' => '' --}}
                {{ Form::label('name', 'Título*', ['class' => 'form-label']) }}
                {{ Form::text('title', null, ['class' => 'form-control', 'id' => 'title', 'placeholder' => 'Ingrese título']) }}
                @error('title')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-2">
                {{ Form::label('content', 'Contenido* ', ['class' => 'form-label']) }}
                {{ Form::textArea('content', null, ['class' => 'form-control input', 'id' => 'content', 'placeholder' => 'Ingresar Contenido']) }}
                @error('content')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>

        </div>

        <div class="col-4">

            <div class="mb-2">
                {{-- 'required' => '' --}}
                {{ Form::label('url_image', 'url imagen*', ['class' => 'form-label']) }}
                {{ Form::textarea('url_image', null, ['class' => 'form-control', 'id' => 'url_image','cols'=>'20','rows'=>'4', 'placeholder' => 'Ingrese url de imagen del logo']) }}
                @error('url_image')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>


        </div>
<!--
            <div class="grid grid-cols-1 mt-0 mx-7">
                <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Subir Imagen</label>
                <div class='flex items-center justify-center w-full'>
                    <label
                        class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                            <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                </path>
                            </svg>
                            <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                Seleccione la imagen</p>
                        </div>
                        <input type='text' name="url_image" id="imagen" class=""/>

                    </label>
                </div>
            </div>

        -->

         <!--   <div class="grid grid-cols-1 mt-1 mx-2">
               {{-- @isset($logo->image)}--}
                    <img src="{{ Storage::url($logo->image->url) }}" id="imagenSeleccionada" >
               {{-- @else --}}
                                   <img src="" id="imagenSeleccionada">
                </div>
              {{--  @endif --}}
            </div>
        -->
            {{-- FIN CAMPO IMAGEN --}}




    </div>
    <div class=" col-12 col-lg-6 mx-auto mb-0 mt-4">
        <a href="{{ route('notasRapidas.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                class="fa-solid fa-delete-left"></i> </i> @isset($grades)
                Volver
            @else
                Cancelar
            @endisset
            </button>
        </a>

        <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
            @isset($grades)
                Actualizar
            @else
                Guardar
            @endisset
        </button>

    </div>
    </div>

    <!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script>
        $(document).ready(function(e) {
            $('#imagen').change(function() {
                let reader = new FileReader();
                reader.onload = (e) => {
                    $('#imagenSeleccionada').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
        });
    </script>
