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

        <div class="mb-2">
            <h4 class="card-title">URL Imagen Empresa </h4>
            {{ Form::textarea('url_image', null, ['class' => 'form-control input', 'id' => 'url_image', 'name' => 'url_image', 'cols' => 20, 'rows' => 3,  'placeholder' => 'url imagen empresa']) }}
            @error('url_image')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
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
