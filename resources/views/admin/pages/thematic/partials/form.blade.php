{{-- <form action="javascript:void(0);" class="form">  --}}
<div class="row">
    <div class="col-8">
        <div class="mb-2">
            {{-- 'required' => ''  --}}
            {{ Form::label('name', 'Nombre*', ['class' => 'form-label']) }}
            {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Ingrese nombre de la tematica']) }}
            @error('name')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-2">
            <label class="form-label" for="payment-input-name">Describe la descripcion</label>
            {{ Form::textarea('description', null, ['class' => 'form-control input', 'id' => 'description', 'name' => 'description', 'cols' => 20, 'rows' => 4, 'placeholder' => 'Breve descripción']) }}
            @error('description')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="col-4">

        <div class="mb-6">
            {{-- 'required' => '' --}}
            {{ Form::label('url_icono', 'url icono*', ['class' => 'form-label']) }}
            {{ Form::textarea('url_icono', null, ['class' => 'form-control', 'id' => 'url_icono', 'cols' => '20', 'rows' => '4', 'placeholder' => 'Ingrese url de icono']) }}
            @error('url_icono')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>

    </div>

    <div class=" col-12 col-lg-6 mx-auto mb-0">
        <a href="{{ route('tematica.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                class="fa-solid fa-delete-left"></i> </i> @isset($thematic)
                Volver
            @else
                Cancelar
            @endisset
            </button>
        </a>

        <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
            @isset($thematic)
                Actualizar
            @else
                Guardar
            @endisset
        </button>

    </div>
</div>
