{{-- <form action="javascript:void(0);" class="form">  --}}
<div class="row">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <div class="row">

    <div class="col-8">
        <div class="mb-2">
            {{-- 'required' => ''  --}}
            {{ Form::label('name_entity', 'Nombre de la empresa*', ['class' => 'form-label']) }}
            {{ Form::text('name_entity',NULL,['class'=>'form-control', 'id' => 'name_entity', 'placeholder' => 'Ingrese nombre' ]) }}
            @error('name_entity')
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label" for="payment-input-name"><i class="fa-brands fa-facebook"></i> Facebook</label>
            {{ Form::text('link_facebook', null, array('class' =>'form-control input','id'=>'link_facebook','name' =>'link_facebook', 'cols' => 20, 'rows' =>4, 'maxlength' => "50",'placeholder'=>'Facebook'))}}
            @error('link_facebook',)
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
        {{-- instagram --}}
        <div class="mb-2">
            <label class="form-label" for="payment-input-name"><i class="fa-brands fa-instagram"></i> Instagram</label>
            {{ Form::text('link_instagram', null, array('class' =>'form-control input','id'=>'link_instagram','name' =>'link_instagram', 'cols' => 20, 'rows' =>4, 'maxlength' => "50",'placeholder'=>'Instagram'))}}
            @error('link_instragram',)
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
  {{-- linkedin --}}
        <div class="mb-2">


            <label class="form-label" for="payment-input-name"><i class="fa-brands fa-linkedin"></i> Linkedin</label>
            {{ Form::text('link_linkedin', null,array('class' =>'form-control input','id'=>'link_linkedin','name' =>'link_linkedin', 'maxlength' => "100",'placeholder'=>'Linkedin',))}}
            @error('link_linkedin',)
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>

        {{-- youtube --}}
        <div class="mb-2">
            <label class="form-label" for="payment-input-name"><i class="fa-brands fa-youtube"></i> Youtube</label>
            {{ Form::text('link_youtube', null, array('class' =>'form-control input','id'=>'link_youtube','name' =>'link_youtube', 'cols' => 20, 'rows' =>4, 'maxlength' => "50",'placeholder'=>'youtube'))}}
            @error('link_youtube',)
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-4">
         {{--
        <div class="yb-6">
            {!! Form::label('path', 'Selecciona una imagen para el logo:', array('class' => 'negrita')) !!}
            {{ Form::file('logo', null, array('class' =>'form-control input','id'=>'logo','logo' =>'logo', 'cols' => 20, 'rows' =>4, 'maxlength' => "50",'placeholder'=>'seleccione logo'))}}
            {!! Html::image($setting->logo.'','',array('class'=>'img-responsive')) !!}
            @error('link_youtube',)
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
        --}}
        {{-- ¨CAMPO IMAGEN --}}

        <div class="grid grid-cols-1 mt-5 mx-7">
            <label class="uppercase md:text-sm text-xs text-gray-500 font-semibold mb-1">Subir Imagen para el logo</label>
                <div class='flex items-center justify-center w-full'>
                    <label class='flex flex-col border-4 border-dashed w-full h-32 hover:bg-gray-100 hover:border-purple-300 group'>
                        <div class='flex flex-col items-center justify-center pt-7'>
                        <svg class="w-10 h-10 text-purple-400 group-hover:text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        <p class='lowercase text-sm text-gray-400 group-hover:text-purple-600 pt-1 tracking-wider'>Seleccione la imagen</p>
                        </div>
                    <input type='file' name="logo" id="imagen"  class="hidden"accept="image/*" />

                    </label>
                </div>
            </div>
            <div class="grid grid-cols-1 mt-1 mx-5">
                <img src="/storage/{{($setting->logo)}}"  id="imagenSeleccionada">
            </div>
              {{-- FIN CAMPO IMAGEN --}}

    </div>

    </div>
    <div class=" col-12 col-lg-6 mx-auto mb-0">
       {{-- <a href="{{ route('configuraciones.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i class="fa-solid fa-delete-left"></i> </i> @isset($setting)Volver @else Cancelar @endisset</button></a> --}}

        <button type="submit" class="btn btn-primary float-start btn-sm"><i class="fa-solid fa-floppy-disk"></i> @isset($setting)Actualizar @else Guardar @endisset</button>

    </div>
</div>

<!-- Script para ver la imagen antes de CREAR UN NUEVO PRODUCTO -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $(document).ready(function (e) {
        $('#imagen').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#imagenSeleccionada').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
