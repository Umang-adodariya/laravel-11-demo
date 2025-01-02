<script src="{{ asset('assets/vendor/libs/jquery/jquery.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/popper/popper.js')}}"></script>
<script src="{{ asset('assets/vendor/js/bootstrap.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/hammer/hammer.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/i18n/i18n.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
<script src="{{ asset('assets/vendor/js/menu.js')}}"></script>

<!-- endbuild -->

<!-- Vendors JS -->
<script src="{{ asset('assets/vendor/libs/%40form-validation/umd/bundle/popular.min.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/%40form-validation/umd/plugin-bootstrap5/index.min.js')}}"></script>
<script src="{{ asset('assets/vendor/libs/%40form-validation/umd/plugin-auto-focus/index.min.js')}}"></script>

<!-- Main JS -->
<script src="{{ asset('assets/js/main.js')}}"></script>


<!-- Page JS -->
<script src="{{ asset('assets/js/pages-auth.js')}}"></script>
<script src="{{ asset('assets/js/parsley.js') }}"></script>
<script>
    $('form').parsley();
</script>
@if(Session::has('success'))
<script>
    toastr.success('{{ Session::get("success") }}');
</script>
@endif
@if(Session::has('error'))
<script>
    toastr.success('{{ Session::get("error") }}');
</script>
@endif