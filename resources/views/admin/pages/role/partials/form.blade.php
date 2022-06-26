{{-- <form action="javascript:void(0);" class="form">  --}}
<div class="row">
    <div class="col-12">
        <div class="mb-2">
            {{-- 'required' => ''  --}}
            {{ Form::label('name', 'Nombre de rol*', ['class' => 'form-label']) }}
            {{ Form::text('name',NULL,['class'=>'form-control', 'id' => 'name', 'placeholder' => 'Ingrese nombre de rol','onload'=>'slugify(this.value)','oninput'=>'slugify(this.value)','onkeyup'=>'slugify(this.value)' ]) }}
            @error('name')
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-2">
            {{-- 'required' => ''  --}}
            {{ Form::label('slug', 'Slug', ['class' => 'form-label']) }}
            {{ Form::text('slug',NULL,['class'=>'form-control', 'id' => 'slug', 'placeholder' => 'Ingrese nombre de rol','readonly'=>'' ]) }}
            @error('slug')
            <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class=" col-12 col-lg-6 mx-auto mb-0">
        <a href="{{ route('roles.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i class="fa-solid fa-delete-left"></i> </i> @isset($role)Volver @else Cancelar @endisset</button></a>
        <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i> @isset($role)Actualizar @else Guardar @endisset</button>
    </div>
</div>
<script>
    // document.getElementById("name").addEventListener("change", slugify);
    // var texto = "el conocimiento es poder";

    function slugify(slug) {
        // var slug = document.getElementById("name");
        slug = slug.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, " ").toLowerCase();
        // Corta los espacios al inicio y al final del sluging
        slug = slug.replace(/^\s+|\s+$/gm, "");
        // Reemplaza el espacio con guión
        slug = slug.replace(/\s+/g, "-");
        // Creo la URL en el campo de texto 'url'
        var input = document.getElementById("slug");
        input.value = slug;
        // Creo la URL en el elemento span 'texto-url'
        document.getElementById("slug").innerHTML = slug;

    }

</script>
