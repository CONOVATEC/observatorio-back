{{-- <form action="javascript:void(0);" class="form"> --}}
<div class="row">
    <div class="col-6">
        <div class="mb-2">
            {{-- 'required' => '' --}}
            <label class="form-label" for="payment-input-name">Describe la misión</label>
            {{ Form::textarea('mission', null, ['class' => 'form-control input', 'id' => 'mision', 'name' => 'mission', 'cols' => 20, 'rows' => 2, 'maxlength' => '100', 'placeholder' => 'M...']) }}
            @error('mission')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-2">
            <label class="form-label" for="payment-input-name">Describe la vision</label>
            {{ Form::textarea('vision', null, ['class' => 'form-control input', 'id' => 'vision', 'name' => 'vision', 'cols' => 20, 'rows' => 2, 'maxlength' => '100', 'placeholder' => 'V...']) }}
            @error('vision')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class="col-md-6">
        <div class="mb-2">
            <label class="form-label" for="payment-input-name">Sobre nosotros</label>
            {{ Form::textarea('about_us', null, ['class' => 'form-control input', 'id' => 'about_us', 'name' => 'about_us', 'cols' => 20, 'rows' => 5, 'maxlength' => '300', 'placeholder' => 'Sobre nosotros...']) }}
            @error('about_us')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="mb-2">
            <label class="form-label" for="payment-input-name">Describe la organización</label>
            {{ Form::textarea('organization_chart', null, ['class' => 'form-control input', 'id' => 'organization_chart', 'name' => 'organization_chart', 'cols' => 20, 'rows' => 5, 'maxlength' => '300', 'placeholder' => 'La organización...']) }}
            @error('organization_chart')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>


    <div class=" col-12 col-lg-6 mx-auto mb-0">
        <a href="{{ route('juvenilesObservatorio.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                class="fa-solid fa-delete-left"></i> </i> @isset($youObservatory)
                Volver
            @else
                Cancelar
            @endisset
            </button>
        </a>

        <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
            @isset($youObservatory)
                Actualizar
            @else
                Guardar
            @endisset
        </button>

    </div>
</div>
