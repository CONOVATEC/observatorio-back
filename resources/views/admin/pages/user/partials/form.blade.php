<div class="row">
    <div class="col-xl-9 col-md-8 col-12 col">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="avatar me-75">
                        {{-- Para mostrar la imagen de perfil --}}
                        <img src="{{ Auth::user() ? Auth::user()->profile_photo_url : asset('images/portrait/small/avatar-s-11.jpg') }}" width="38" height="38" alt="Avatar" />
                    </div>
                    <div class="author-info">
                        <h6 class="mb-25">{{ auth()->user()->name }}</h6>
                        <p class="card-text">{{ \carbon\Carbon::now()->isoFormat('DD MMMM  YYYY, h:mm a') }}</p>
                    </div>
                </div>
                <!-- Form -->
                <form action="javascript:;" class="mt-2">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('name', __('Names and Surnames'), ['class' => 'form-label']) !!}
                                {!! Form::text('name', NULL, ['class' =>'form-control' ,'id' =>'name','placeholder' => __('Enter data'),'autofocus'=>'']) !!}
                                @error('name')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('username', __('Username'), ['class' => 'form-label']) !!}
                                {!! Form::text('username', NULL, ['class' =>'form-control' ,'id' =>'username','placeholder' => __('Enter data'),]) !!}
                                @error('username')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('email', __('Email'), ['class' => 'form-label']) !!}
                                {!! Form::email('email', NULL, ['class' =>'form-control' ,'id' =>'email','placeholder' => __('Enter data'),]) !!}
                                @error('email')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12 ">
                            {!! Form::label('password', __('Password'), ['class' => 'form-label']) !!}
                            <div class="mb-2">
                                <div class="input-group input-group-merge form-password-toggle">
                                    {!! Form::password('password', ['class' =>'form-control form-control-merge' ,'id' =>'password','placeholder' => __('Enter data'),'tabindex' =>'-1','autocomplete' =>'new-password']) !!}
                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                </div>
                                @error('password')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror

                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('phone', __('Cell No.'), ['class' => 'form-label']) !!}
                                {!! Form::number('phone', NULL, ['class' =>'form-control' ,'id' =>'phone','placeholder' => __('Enter data'),]) !!}
                                @error('phone')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('roles', __('Roles'), ['class' => 'form-label']) !!}
                                {!! Form::select('roles[]', $roles, null ,['class' => 'form-select select2','id' => 'roles','multiple' => true]) !!}
                                @error('roles')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('created_at', __('Registration date'), ['class' => 'form-label']) !!}
                                {!! Form::date('created_at',(isset($user)) ? $user->created_at : \Carbon\Carbon::now(), ['class' =>'form-control' ,'id' =>'created_at',]) !!}
                                @error('created_at')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="mb-2">
                                {!! Form::label('status', __('Status'), ['class' => 'form-label']) !!}
                                {!! Form::select('status', [null=>'Seleccione un estado']+['1'=>'Inactivo','2'=>'Activo'], null ,['class' => 'form-select select2','id' => 'status']) !!}
                                @error('status')
                                <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-2">
                                <label class="form-label">{{ __('Biography') }}</label>
                                {{-- {!! Form::hidden('biography', null, ['id'=>'biography']) !!} --}}
                                <textarea style="display: none" id="biography" name="biography"></textarea>
                                {{-- <input name="biography" type="hidden" id="biography" value=""> --}}
                                <div id="blog-editor-wrapper">
                                    <div id="blog-editor-container">
                                        <div class="editor">
                                            {{-- Aquí va el contenido del editor --}}
                                        </div>
                                        @error('biography')
                                        <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mb-2">
                            <div class="border rounded p-2">
                                <h4 class="mb-1">{{ __('Featured Image') }}</h4>
                                <div class="d-flex flex-column flex-md-row">
                                    @isset($user->profile_photo_path)
                                    <img src="/storage/{{($user->profile_photo_path)}}" id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                    {{-- /storage/{{ $student->image }} --}}
                                    @else
                                    <img src="{{asset('images/admin/perfil/anonimo.jpg')}}" id="blog-feature-image" class="rounded me-2 mb-1 mb-md-0" width="170" height="110" alt="Blog Featured Image" />
                                    @endisset
                                    <div class="featured-info">
                                        <small class="text-muted">{{ __('Required image resolution 800x400, image size max 2mb.') }}</small>
                                        <p class="my-50">
                                            @isset($user->profile_photo_path)
                                            <a href="/storage/{{($user->profile_photo_path)}}" target="_blank" id="blog-image-text">www.conovatec.pe/perfil</a>
                                            @else
                                            <a href="{{asset('images/admin/perfil/anonimo.jpg')}}" target="_blank" id="blog-image-text">www.conovatec.pe/usuario</a>
                                            @endisset
                                        </p>
                                        <div class="d-inline-block">
                                            {!! Form::file('profile_photo_path', ['class' =>'form-control','id' =>'blogCustomFile','accept'=>'image/*']) !!}
                                            @error('profile_photo_path')
                                            <span class="text-danger form-label fw-bold" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--/ Form -->
            </div>
        </div>
        <hr class="invoice-spacing mt-0" />
    </div>
    <!-- Invoice Edit Left ends -->

    <!-- Invoice Edit Right starts -->
    <div class="col-xl-3 col-md-4 col-12 col">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary w-100 mb-75" data-bs-toggle="modal" data-bs-target="#send-invoice-sidebar">
                    <i class="fas fa-save"></i> Guardar
                </button>
                <a href="{{route('roles.index')}}" class="btn btn-outline-primary w-100 mb-75"><i class="fas fa-user-shield"></i> Ver roles</a>
                {{-- <button class="btn btn-success w-100 mb-75" data-bs-toggle="modal" data-bs-target="#add-payment-sidebar">
                        Ver perfil
                    </button> --}}
                <a href="{{ route('usuarios.index') }}" class="btn btn-danger w-100 mb-75">
                    <i class="fas fa-fast-backward"></i> Volver
                </a>
            </div>
        </div>
    </div>
    <!-- Invoice Edit Right ends -->

</div>
