{{-- <form action="javascript:void(0);" class="form"> --}}
    <div class="row">
        <div class="col-md-6">
            <div class="mb-2">
               
                {{ Form::label('user', 'Usuario que realiza la publicación*', ['class' => 'form-label fw-bold']) }}
                {{ Form::text('user',auth()->user()->name,['class'=>'form-control','readonly' ]) }}
                
                {{Form::hidden('user_id',auth()->user()->id)}}
            </div>
        </div>
        <div class="col-8">
            <div class="mb-2">
                {{ Form::label('title', 'Título de la Noticia*', ['class' => 'form-label fw-bold']) }}
                {{ Form::text('title',null,['class'=>'form-control', 'placeholder' => 'Ingresar Título' ]) }}
                @error('title')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-4">
            <div class="mb-2">
                {{ Form::label('slug', 'Slug', ['class' => 'form-label fw-bold']) }}
                {{ Form::text('slug',null,['class'=>'form-control' ]) }}
                @error('slug')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="mb-2">
                {{-- 'required' => '' --}}
                <label class="form-label fw-bold" for="payment-input-name">Estracto</label>
                {{ Form::textarea('extract', null, ['class' => 'form-control input', 'id' => 'extract', 'name' => 'extract', 'cols' => 20, 'rows' => 7,  'placeholder' => 'M...']) }}
                @error('extract')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
       
        <div class="col-12">
            <div class="mb-2">
                {{-- 'required' => '' --}}
                <label class="form-label fw-bold" for="payment-input-name">Contenido</label>
                {{ Form::textarea('content', null, ['class' => 'form-control input', 'id' => 'content', 'name' => 'content', 'cols' => 20, 'rows' => 7,  'placeholder' => 'M...']) }}
                @error('content')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-2">
                <p class="fw-bold">Etiquetas</p>
                @foreach ($tags as $values)
                    <label class="mr-2 fw-bold">
                        {{ Form::checkbox('tags[]', $values->id, null,['class' => 'form-label']) }}    
                        {{$values->name}}
                    </label>
                @endforeach
                <br>
                @error('tags')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
            </div>
        </div>

    
        <div class="col-md-6">
            <div class="mb-2">
                {{ Form::label('category_id', 'Categoría de la Noticia*', ['class' => 'form-label fw-bold']) }}
                {{Form::select('category_id', $categories ,NULL,['class'=>'form-select'])}}        
                @error('category_id')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="mb-2">
                {{ Form::label('status', 'Seleccionar', ['class' => 'form-label fw-bold']) }}
                {{Form::select('status', array('1' => 'No Publicar', '2' => 'Publicar'),NULL,['class'=>'form-select'])}}        
                @error('status')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-2">
                {{ Form::label('tendencia_active', 'Tendencia*', ['class' => 'form-label fw-bold']) }}
                {{ Form::text('tendencia_active',NULL,['class'=>'form-control', 'id' => 'tendencia_active', 'placeholder' => 'Ingresar Tendencia']) }}
                @error('tendencia_active')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

       

      

       

        <div class=" col-12 col-lg-6 mx-auto mb-0">
            <a href="{{ route('noticias.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                    class="fa-solid fa-delete-left"></i> </i> @isset($post)
                    Volver
                @else
                    Cancelar
                @endisset
                </button>
            </a>
    
            <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
              
                Guardar
          
            </button>
    
        </div>


        
    
    
       
    </div>

