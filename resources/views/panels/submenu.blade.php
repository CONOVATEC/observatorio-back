{{-- For submenu --}}
<ul class="menu-content">
    @if(isset($menu))
    {{-- @json(($menu)) --}}

    @foreach($menu as $submenu)
    {{-- @json($submenu) --}}
    <li @if($submenu->slug === Route::currentRouteName()) class="active" @endif>
        @forelse($permissions as $permission)
        @if ($submenu->slug == $permission->name)
        <a href="{{isset($submenu->url) ? url($submenu->url):'javascript:void(0)'}}" class="d-flex align-items-center" target="{{isset($submenu->newTab) && $submenu->newTab === true  ? '_blank':'_self'}}">
            @if(isset($submenu->icon))
            <i data-feather="{{$submenu->icon}}"></i>
            @endif
            <span class="menu-item text-truncate">{{ __('locale.'.$submenu->name) }}</span>
        </a>
        @endif
        @empty
        @endforelse

        @if (isset($submenu->submenu))
        {{-- @if(auth()->user()->can('categorias.index') ) --}}
        @include('panels/submenu', ['menu' => $submenu->submenu])
        {{-- @endif --}}
        @endif
    </li>
    @endforeach
    @endif
</ul>
