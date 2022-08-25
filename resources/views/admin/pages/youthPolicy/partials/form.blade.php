{{-- <form action="javascript:void(0);" class="form"> --}}



<div class="row">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <div class="row">
        <div class="col-12">

            <div class="card">
                <!---->
                <!---->
                <div class="card-body">
                    <!---->
                    <!---->
                    <div class="mb-2">
                        <h4 class="card-title">Nombre </h4>
                        {{ Form::text('name', null, ['class' => 'form-control input', 'id' => 'name', 'name' => 'name', 'maxlength' => '255', 'placeholder' => 'Nombre']) }}
                        @error('name')
                            <span class="text-danger form-label fw-bold">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-2">
                        <h4 class="card-title">Descripcion </h4>
                        {{ Form::textarea('description', null, ['class' => 'form-control input', 'id' => 'description', 'name' => 'description', 'cols' => 30, 'rows' => 8, 'placeholder' => 'Descripcion']) }}
                        @error('description')
                            <span class="text-danger form-label fw-bold">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="grid grid-cols-1 mt-0 mx-7">
                        <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Subir
                            Imagen</label>
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
                                    <p
                                        class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>
                                        Seleccione la imagen</p>
                                </div>
                                <input type='file' name="image_policy" id="imagen"
                                    class="hidden"accept="image/*" />

                            </label>
                        </div>
                    </div>


                    <div class="grid grid-cols-1 mt-1 mx-2">
                        @isset($youthPolicy->image)
                            <img src="{{ Storage::url($youthPolicy->image->url) }}" id="imagenSeleccionada">
                        @else
                            <img src="" id="imagenSeleccionada">
                        </div>
                        @endif

                    </div>

                </div>
            </div>


        </div>

        <div class="col-12">

            <div class="card bg-light ">
                <!---->
                <!---->
                <div class="card-body">
                    <!---->
                    <!---->
                    <div class="mb-2">
                        <h4 class="card-title text-success">Link Video </h4>
                        {{ Form::textarea('link_video', null, ['class' => 'form-control input', 'id' => 'link_video', 'name' => 'link_video', 'cols' => 20, 'rows' => 4, 'maxlength' => '250', 'placeholder' => 'link']) }}
                        @error('link_video')
                            <span class="text-danger form-label fw-bold">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="mb-2">
                        <h4 class="card-title text-success">Link Drive </h4>
                        {{ Form::textarea('link_drive', null, ['class' => 'form-control input', 'id' => 'link_drive', 'name' => 'link_drive', 'cols' => 20, 'rows' => 4, 'maxlength' => '250', 'placeholder' => 'link']) }}
                        @error('ordinance')
                            <span class="text-danger form-label fw-bold">{{ $message }}</span>
                        @enderror

                    </div>

                </div>
            </div>


        </div>


    </div>





    <div class=" col-12 col-lg-6 mx-auto mb-0">
        <a href="{{ route('politicaJuvenil.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                class="fa-solid fa-delete-left"></i> </i> @isset($youthPolicy)
                Volver
            @else
                Cancelar
            @endisset
            </button>
        </a>

        <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
            @isset($youthPolicy)
                Actualizar
            @else
                Guardar
            @endisset
        </button>

    </div>

 </div>






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
