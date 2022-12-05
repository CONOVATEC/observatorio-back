{{-- <form action="javascript:void(0);" class="form"> --}}
    <div class="row">
        <div class="col-8">

            <div class="card bg-primary text-white"><!----><!---->
                <div class="card-body"><!----><!---->
                    <div class="mb-2">
                <h4 class="card-title text-white">Titulo CMPJ </h4>
                {{ Form::text('title_cmpj', null, ['class' => 'form-control input', 'id' => 'title_cmpj', 'name' => 'title_cmpj', 'maxlength' => '255', 'placeholder' => 'Titulo']) }}
                @error('title_cmpj')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>


                <div class="mb-2">
                <h4 class="card-title text-white">Descripcion CMPJ </h4>
                {{ Form::textarea('description_cmpj', null, ['class' => 'form-control input', 'id' => 'description_cmpj', 'name' => 'description_cmpj', 'cols' => 30, 'rows' => 8, 'placeholder' => 'Descripcion']) }}
                @error('description_cmpj')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror

                 </div>


            </div>
            </div>


        </div>


        <div class="col-4">

            <div class="card bg-light "><!----><!---->
                <div class="card-body"><!----><!---->
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

    <div class="row">
        <h4 class="card-title text-black text-center">CMPJ - Instancias de Dirección </h4>

        <div class="col-6">

            <div class="card bg-secondary text-white"><!----><!---->
                <div class="card-body"><!----><!---->
                    <div class="mb-2">
                <h4 class="card-title text-white">Titulo Asamblea </h4>
                {{ Form::text('title_assembly', null, ['class' => 'form-control input', 'id' => 'title_assembly', 'name' => 'title_assembly', 'maxlength' => '255', 'placeholder' => 'Titulo']) }}
                @error('title_assembly')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>


                <div class="mb-2">
                <h4 class="card-title text-white">Descripcion Asamblea </h4>
                {{ Form::textarea('description_assembly', null, ['class' => 'form-control input', 'id' => 'description_assembly', 'name' => 'description_assembly', 'cols' => 25, 'rows' => 4, 'maxlength' => '250', 'placeholder' => 'Descripcion']) }}
                @error('description_assembly')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror

                 </div>


            </div>
            </div>


        </div>


        <div class="col-6">

            <div class="card bg-secondary text-white"><!----><!---->
                <div class="card-body"><!----><!---->
                    <div class="mb-2">
                <h4 class="card-title text-white">Titulo Directiva </h4>
                {{ Form::text('title_directive', null, ['class' => 'form-control input', 'id' => 'title_directive', 'name' => 'title_directive', 'maxlength' => '255', 'placeholder' => 'Titulo']) }}
                @error('title_directive')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>


                <div class="mb-2">
                <h4 class="card-title text-white">Descripcion Directiva </h4>
                {{ Form::textarea('description_directive', null, ['class' => 'form-control input', 'id' => 'description_directive', 'name' => 'description_directive', 'cols' => 25, 'rows' => 4, 'maxlength' => '250', 'placeholder' => 'Descripcion']) }}
                @error('description_directive')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror

                 </div>


            </div>
            </div>


        </div>



            </div>
















    <div class="row">
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

</div>

