@if(Session::has('success'))
    <script>
        toastr.success('{{ Session::get("success") }}', 'Berhasil');
    </script>
@endif
@if(Session::has('warning'))
    <script>
        toastr.warning('{{ Session::get("warning") }}', 'Perhatian');
    </script>
@endif
@if(Session::has('error'))
    <script>
        toastr.warning('{{ Session::get("error") }}', 'Error');
    </script>
@endif
