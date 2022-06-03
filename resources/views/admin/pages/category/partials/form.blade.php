{{-- <form action="javascript:void(0);" class="form">  --}}
<div class="row">
    <div class="col-12">
        <div class="mb-2">
            {{-- 'required' => ''  --}}
            {{ Form::label('name', 'Nombre de categoría*', ['class' => 'form-label']) }}
            {{ Form::text('name',NULL,['class'=>'form-control', 'id' => 'name', 'placeholder' => 'Ingrese categoría' ]) }}
            @error('name')
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-2">
            <label class="form-label" for="payment-input-name">Describe categoría</label>
            {{ Form::textarea('description', null, array('class' =>'form-control input','id'=>'description','name' =>'description', 'cols' => 20, 'rows' =>4, 'maxlength' => "50",'placeholder'=>'Breve descripción'))}}
            @error('description',)
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class=" col-12 col-lg-6 mx-auto mb-0">
        <a href="{{ route('categorias.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i class="fa-solid fa-delete-left"></i> </i> @isset($category)Volver @else Cancelar @endisset</button></a>

        <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i> @isset($category)Actualizar @else Guardar @endisset</button>

    </div>
</div>
