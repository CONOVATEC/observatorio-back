<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{asset(mix('vendors/js/ui/jquery.sticky.js'))}}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

@if($configData['blankPage'] === false)
<script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->

@stack('modals')
@livewireScripts
<script defer src="{{ asset(mix('vendors/js/alpinejs/alpine.js')) }}"></script>
<!-- Para  ícono -->
<script defer src="{{ URL::to('/admin/plugins/fontawesome/js/all.min.js') }}"></script>
{{-- Inicio para Toastr  --}}
<script defer src="{{ asset(mix('vendors/js/extensions/toastr.min.js')) }}"></script>
{{-- fin para Toastr  --}}
{{-- Inicio para SweetAlert  --}}
{{-- Alerta personalizado  --}}
<script defer src="{{ URL::to('/admin/alert/sweetAlert.js') }}"></script>
{{-- fin alerta personalizado  --}}
<script src="{{ asset(mix('vendors/js/extensions/sweetalert2.all.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/extensions/polyfill.min.js')) }}"></script>

<script src="{{ asset(mix('js/scripts/extensions/ext-component-sweet-alerts.js')) }}"></script>
<script src="{{ asset('js/alpine.js') }}"></script>

<script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
{{-- Incluimos las tostadas de confirmación  --}}
<script>
    $(document).ready(function () {
        $("#title").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });

        @if(Session::has('success'))
        toastr["success"]("{{ session('success') }}", "💪 Excelente!", {
            closeButton: true,
            tapToDismiss: false,
        });
        @endif

        // info message popup notification
        @if(Session::has('info'))
        toastr["info"]("{{ session('info') }}", "🔔 Información !", {
            closeButton: true,
            tapToDismiss: false,
        });
        @endif

        // warning message popup notification
        @if(Session::has('warning'))
        toastr["warning"]("{{ session('warning') }}", "💡 Aviso !", {
            closeButton: true,
            tapToDismiss: false,
        });
        @endif

        // error message popup notification
        @if(Session::has('error'))
        toastr["error"]("{{ session('error') }}", "💪 Error !", {
            closeButton: true,
            tapToDismiss: false,
        });
        @endif
    });

</script>


{{-- fin para SweetAlert  --}}
