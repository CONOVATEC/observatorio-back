{{-- <form action="javascript:void(0);" class="form"> --}}
    <div class="row">
        <div class="col-12">
            <div class="mb-2">
                <label class="form-label" for="payment-input-name">sobre nosostros</label>
                {{ Form::textarea('about_us', null, ['class' => 'form-control input', 'id' => 'about_us', 'name' => 'about_us', 'cols' => 20, 'rows' => 4, 'maxlength' => '255', 'placeholder' => 'V...']) }}
                @error('about_us')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-2">
                {{-- 'required' => '' --}}
                <label class="form-label" for="payment-input-name">Describe la ordenanza</label>
                {{ Form::textarea('ordinance', null, ['class' => 'form-control input', 'id' => 'ordinance', 'name' => 'ordinance', 'cols' => 20, 'rows' => 4, 'maxlength' => '250', 'placeholder' => 'M...']) }}
                @error('ordinance')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
       
    
    
        <div class="col-md-6">
            <div class="mb-2">
                <label class="form-label" for="payment-input-name">Describe las funciones</label>
                {{ Form::textarea('functions', null, ['class' => 'form-control input', 'id' => 'functions', 'name' => 'functions', 'cols' => 20, 'rows' => 4, 'maxlength' => '300', 'placeholder' => 'La organización...']) }}
                @error('functions')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-2">
                <label class="form-label" for="payment-input-name">Junta Directiva</label>
                {{ Form::textarea('board_of_directors', null, ['class' => 'form-control input', 'id' => 'board_of_directors', 'name' => 'board_of_directors', 'cols' => 20, 'rows' => 5, 'maxlength' => '300', 'placeholder' => 'Sobre nosotros...']) }}
                @error('board_of_directors')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-2">
                <label class="form-label" for="payment-input-name">Social</label>
                {{ Form::textarea('social', null, ['class' => 'form-control input', 'id' => 'social', 'name' => 'social', 'cols' => 20, 'rows' => 5, 'maxlength' => '300', 'placeholder' => 'La organización...']) }}
                @error('social')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-2">
                <label class="form-label" for="payment-input-name">Registrar la vision</label>
                {{ Form::textarea('vision', null, ['class' => 'form-control input', 'id' => 'vision', 'name' => 'vision', 'cols' => 20, 'rows' => 5, 'maxlength' => '300', 'placeholder' => 'La organización...']) }}
                @error('vision')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
    
        <div class=" col-12 col-lg-6 mx-auto mb-0">
            <a href="{{ route('sobreCmpj.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                    class="fa-solid fa-delete-left"></i> </i> @isset($aboutCmpj)
                    Volver
                @else
                    Cancelar
                @endisset
                </button>
            </a>
    
            <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
                @isset($aboutCmpj)
                Actualizar
            @else
                Guardar
            @endisset
            </button>
    
        </div>
    </div>
    