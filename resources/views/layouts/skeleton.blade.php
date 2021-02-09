<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>@yield('title', 'Home') &mdash; {{ config('app.name') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  @stack('stylesheet')
</head>

<body>
<div id="app">
  @yield('app')
</div>
<script src="{{ mix('js/manifest.js') }}"></script>
<script src="{{ mix('js/vendor.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@include('include.toastr')
<script>
    tinymce.init({
      height: 320,
      selector: '.tiny',
      plugins: [
        'advlist autolink lists link image charmap hr',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime save table directionality',
        'paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | bold italic | forecolor backcolor | template link image',
    toolbar2: 'styleselect | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent ',
    image_advtab: false,
    });
</script>
@stack('javascript')
</body>
</html>
