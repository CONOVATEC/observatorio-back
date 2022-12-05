<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>
    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">

        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div class="mb-1" x-data="{photoName: null, photoPreview: null}">
            <!-- Profile Photo File Input -->
            <input type="file" hidden wire:model="photo" x-ref="photo" x-on:change=" photoName = $refs.photo.files[0].name; const reader = new FileReader(); reader.onload = (e) => { photoPreview = e.target.result;}; reader.readAsDataURL($refs.photo.files[0]);" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" class="rounded-circle" height="80px" width="80px">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview">
                <img x-bind:src="photoPreview" class="rounded-circle" width="80px" height="80px">
            </div>

            <x-jet-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            @if ($this->user->profile_photo_path)
            <button type="button" class="btn btn-danger text-uppercase mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </button>
            @endif
            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif
        <!-- USERNAME -->
        <div class="mb-1">
            <x-jet-label class="form-label" for="username" value="{{ __('Username') }}" />
            <x-jet-input id="username" type="text" class="{{ $errors->has('username') ? 'is-invalid' : '' }}" wire:model.defer="state.username" />
            <x-jet-input-error for="username" />
        </div>
        <!-- APELLIDOS Y NOMBRES -->
        <div class="mb-1">
            <x-jet-label class="form-label" for="name" value="{{ __('Names and Surnames') }}" />
            <x-jet-input id="name" type="text" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" />
        </div>

        <!-- Email -->
        <div class="mb-1">
            <x-jet-label class="form-label" for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" wire:model.defer="state.email" />
            <x-jet-input-error for="email" />
        </div>
        <!-- CELULAR -->
        <div class="mb-1">
            <x-jet-label class="form-label" for="phone" value="{{ __('Phone') }}" />
            <x-jet-input id="phone" type="number" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}" wire:model.defer="state.phone" />
            <x-jet-input-error for="phone" />
        </div>
        <!-- BIOGRAFÍA -->
        <div class="mb-1">
            <!-- <x-jet-label class="form-label" for="biography" value="{{ __('Biography') }}" />
      <x-jet-input id="biography" type="text" class="{{ $errors->has('biography') ? 'is-invalid' : '' }}"
        wire:model.defer="state.biography" />
      <x-jet-input-error for="biography" /> -->
            <!-- </div> -->
            <x-jet-label class="form-label" for="biography" value="{{ __('Biography') }}" />
            <textarea id="biography" class="{{ $errors->has('biography') ? 'is-invalid' : ''}} form-control
        block
        w-full
        px-3
        py-1.5
        text-base
        font-normal
        text-gray-700
        bg-white bg-clip-padding
        border border-solid border-gray-300
        rounded
        transition
        ease-in-out
        m-0
        focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" wire:model.defer="state.biography" placeholder="Descríbete..!"></textarea>
            <x-jet-input-error for="biography" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <div class="d-flex align-items-center">
            <a type="button" href="{{ route('usuarios.show',Auth::user()->id) }}" class="btn btn-danger text-uppercase mx-2">
                {{ __('return') }}
            </a>
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </div>
    </x-slot>
</x-jet-form-section>
