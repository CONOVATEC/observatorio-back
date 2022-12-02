{{-- <form action="javascript:void(0);" class="form"> --}}
<div class="row">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <div class="col-6">
        <div class="mb-2">
            {{-- 'required' => '' --}}
            <label class="form-label" for="payment-input-name">Describe la misión</label>
            {{ Form::textarea('mission', null, ['class' => 'form-control input', 'id' => 'mision', 'name' => 'mission', 'cols' => 20, 'rows' => 2, 'maxlength' => '255', 'placeholder' => 'aqui la mision']) }}
            @error('mission')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-2">
            <label class="form-label" for="payment-input-name">Describe la vision</label>
            {{ Form::textarea('vision', null, ['class' => 'form-control input', 'id' => 'vision', 'name' => 'vision', 'cols' => 20, 'rows' => 2, 'maxlength' => '255', 'placeholder' => 'aqui la vision']) }}
            @error('vision')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="mb-2">
            <label class="form-label" for="payment-input-name">Sobre nosotros</label>
            {{ Form::textarea('about_us', null, ['class' => 'form-control input', 'id' => 'about_us', 'name' => 'about_us', 'cols' => 20, 'rows' => 5,  'placeholder' => 'aqui informacion sobre nosotros']) }}
            @error('about_us')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">

        <div class="mb-2">
            <label class="form-label" for="payment-input-name">URL imagen Organigrama</label>
            {{ Form::textarea('url_organization_chart', null, ['class' => 'form-control input', 'id' => 'url_organization_chart', 'name' => 'url_organization_chart', 'cols' => 20, 'rows' => 3,  'placeholder' => 'url imagen organigrama']) }}
            @error('url_organization_chart')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>


            </div>

    </div>


    <div class=" col-12 col-lg-6 mx-auto mb-0">
        <a href="{{ route('observatorioJuvenil.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                class="fa-solid fa-delete-left"></i> </i> @isset($youthObservatory)
                Volver
            @else
                Cancelar
            @endisset
            </button>
        </a>

        <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
            @isset($youthObservatory)
                Actualizar
            @else
                Guardar
            @endisset
        </button>

    </div>
</div>

