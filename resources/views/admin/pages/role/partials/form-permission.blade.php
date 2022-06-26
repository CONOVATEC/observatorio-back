{{-- <form action="javascript:void(0);" class="form">  --}}
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="mb-1 col-12 col-lg-9">
                {{-- 'required' => ''  --}}
                {{ Form::label('name', 'Rol seleccionado', ['class' => 'form-label']) }}
                {{ Form::text('name',NULL,['class'=>'form-control', 'id' => 'name', 'placeholder' => 'Ingrese nombre de rol','readonly' => '','tabindex'=>"-1"]) }}
                @error('name')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
            <div class=" my-auto col-12 col-lg-3 mx-auto">
                <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
            </div>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 ">
        <div class="mb-2 card">
            <h5 class="mb-0 pb-0">Seleccione permiso</h5>
            <div class="card-body">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="selectAll" />
                    <label class="form-check-label" for="selectAll" id="seleccionar"> Seleccionar todo </label>
                </div>
                <hr>
                @forelse($permissions as $permission)
                <div class="form-check me-3 me-lg-5">
                    {!! Form::checkbox('permissions[]',$permission->id,null,['class'=>' form-check-input','id' => $permission->id]) !!}
                    {{ Form::label($permission->id,  $permission->description, ['class' => 'form-check-label']) }}
                </div>
                @empty
                <P>No existe ningún permiso</P>
                @endforelse

                @error('permission')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
</div>
<script>
    (function() {
        // Para cambiar el nombre del label seleccionar
        var checkbox = document.getElementById('selectAll');
        checkbox.addEventListener("change", validaCheckbox, false);
        function validaCheckbox() {
            var checked = checkbox.checked;
            if (checked) {
                document.getElementById('seleccionar').innerHTML = "Deseleccionar todo";
            } else {
                document.getElementById('seleccionar').innerHTML = "Seleccionar todo";
            }
        }
        // Para seleccionar o deseleccionar los checkboxs
        const selectAll = document.querySelector('#selectAll')
            , checkboxList = document.querySelectorAll('[type="checkbox"]');
        selectAll.addEventListener('change', t => {
            checkboxList.forEach(e => {
                e.checked = t.target.checked;
            });
        });

    })();

</script>
