@extends('layouts.contentLayoutMaster')

@php
$breadcrumbs = [['link' => 'home', 'name' => 'Inicio'], ['link' => 'usuarios', 'name' => 'Usuarios'], ['name' => 'Perfil']];
@endphp

@section('title', 'Perfil')


@section('content')

@if (Laravel\Fortify\Features::canUpdateProfileInformation())
@livewire('profile.update-profile-information-form')
@endif

@if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
@livewire('profile.update-password-form')
@endif
{{-- Comentamos authentication de 2 pasos --}}
{{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
@livewire('profile.two-factor-authentication-form')
@endif --}}

@livewire('profile.logout-other-browser-sessions-form')

@if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
@livewire('profile.delete-user-form')
@endif

@endsection
