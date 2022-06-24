@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <style>
    
    .imagen{

       
    }
  </style>
@endsection
{{-- <form action="javascript:void(0);" class="form"> --}}
    <div class="row">
        <div class="col-md-6">
            <div class="mb-2">
                <div class="avatar avatar-xl">
                    <img src="{{asset('images/portrait/small/avatar-s-5.jpg')}}" alt="Avatar" height="10" width="10" />
                  </div>
                  <strong> {{auth()->user()->name}}</strong>
              
               
                
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
                {{ Form::text('slug',null,['class'=>'form-control', 'readonly']) }}
                @error('slug')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                @isset ($post->image)
                
                    <img src="{{Storage::url($post->image->url)}}"  class="w-100 h-100 pb-2" id="picture"  alt="sdf">
                @else
                     <img src="https://cdn.pixabay.com/photo/2019/10/21/12/01/newspapers-4565916_960_720.jpg" class=" w-100 h-100 pb-2"  id="picture"  alt="">
                @endif
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{form::label('file','Cargar una Img')}}
                    {{Form::file('file',['class'=>'form-control-file','accept'=>'image/*'])}}
                </div>
                @error('file')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            <br>
                <p>Solo esta permitido formato de images como: <span class="text-danger">PNG,JPG,JPEG</span> </p>
            </div>
        </div>



        <div class="col-12">
            <div class="mb-2">
                {{-- 'required' => '' --}}
                <label class="form-label fw-bold" for="payment-input-name">Estracto*</label>
                {{ Form::textarea('extract', null, ['class' => 'form-control input', 'id' => 'extract', 'name' => 'extract', 'cols' => 20, 'rows' => 7,  'placeholder' => 'M...']) }}
                @error('extract')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
       
        <div class="col-12">
            <div class="mb-2">
                {{-- 'required' => '' --}}
                <label class="form-label fw-bold" for="payment-input-name">Contenido*</label>
                {{ Form::textarea('content', null, ['class' => 'form-control input', 'id' => 'content', 'name' => 'content', 'cols' => 20, 'rows' => 7,  'placeholder' => 'M...']) }}
                @error('content')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-2">
                <p class="fw-bold">Etiquetas de la Noticia*</p>
                {{Form::select('tags[]', $tags ,NULL,['class'=>'select2 form-select','multiple'])}}
               
                <br>
                @error('tags')
                <span class="text-danger form-label fw-bold">{{ $message }}</span>
            @enderror
            </div>
        </div>

    
        <div class="col-md-6">
            <div class="mb-2">
                {{ Form::label('category_id', 'Categoría de la Noticia*', ['class' => 'form-label fw-bold']) }}
                {{Form::select('category_id', $categories ,NULL,['class'=>'select2 form-select'])}}   
                
                @error('category_id')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>
    
        <div class="col-md-6">
            <div class="mb-2">
                <p>Estado de la Noticia*</p>
               
                <label>{!!Form::radio('status',1,true)!!}No publicar</label>
                <label>{!!Form::radio('status',2)!!}Publicado</label>
               
                @error('status')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <div class="mb-2">
                {{ Form::label('tendencia_active', 'Tendencia*', ['class' => 'form-label fw-bold']) }} <br>
                <label >
                    {{Form::radio('tendencia_active',1,true)}}
                    Con Tendencia
                </label>
                <label >
                    {{Form::radio('tendencia_active',2)}}
                    Sin Tendencia
                </label>
                <br>
               
                @error('tendencia_active')
                    <span class="text-danger form-label fw-bold">{{ $message }}</span>
                @enderror
            </div>
        </div>

       

      

       

        <div class=" col-12 col-lg-6 mx-auto mb-0">
            <a href="{{ route('noticias.index') }}" type="button" class="btn btn-danger float-start btn-sm"><i
                    class="fa-solid fa-delete-left"></i> </i> 
                    @isset($posts)
                        Volver
                    @else
                        Cancelar
                     @endisset
                </button>
            </a>
    
            <button type="submit" class="btn btn-primary float-end btn-sm"><i class="fa-solid fa-floppy-disk"></i>
                @isset($posts)
                Actualizar
                @else
                    Guardar
                @endisset
              
          
            </button>
    
        </div>


        
    
      
       
    </div>

   
    

    @section('page-script')
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.1.0/classic/ckeditor.js"></script>
    <script>
        document.getElementById("file").addEventListener('change',cambiarImagen);
        
        function cambiarImagen(event){
            
            var file=event.target.files[0];
            var reader=new FileReader();
            reader.onload=(event)=>{
                document.getElementById('picture').setAttribute('src',event.target.result);
            };
            reader.readAsDataURL(file);
    
        }
    </script>
    
    <script>
        ClassicEditor
        .create( document.querySelector( '#extract' ),{
            toolbar: {
                items: [   'heading', '|','bold', 'italic', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList' ],
            
            }
        } )
        .then( editor => {
            console.log( 'Editor was initialized', editor );
        } )
        .catch( err => {
            console.error( err.stack );
        } );
        ClassicEditor
        .create( document.querySelector( '#content' ),{
            toolbar: {
                items: [   'heading', '|','bold', 'italic', '|', 'undo', 'redo', '-', 'numberedList', 'bulletedList' ],
            
            }
        } )
        .then( editor => {
            console.log( 'Editor was initialized', editor );
        } )
        .catch( err => {
            console.error( err.stack );
        } );
    </script>
    
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection