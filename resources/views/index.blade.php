<!DOCTYPE html>
<html lang="zxx" class="js">

    <head>
        <meta charset="utf-8">
        <meta name="author" content="Simahanku">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Simahanku">
        <!-- Fav Icon  -->
        <link rel="shortcut icon" href="{{ asset('images/sisemping.png') }}">
        <!-- Page Title  -->
        <title>Sisemping | Index</title>
        <!-- StyleSheets  -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.1.0') }}">
        <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.1.0') }}">
        <!-- tinyMCE -->
        <script src="{!! url('assets/js/tinymce/tinymce.min.js') !!}"></script>
        @yield('style')
    </head>

    <body>
        @include('layout.header-index')
        <script src="{{ asset('assets/js/bundle.js?ver=3.1.0') }}"></script>
        <script src="{{ asset('assets/js/scripts.js?ver=3.1.0') }}"></script>
        <script src="{{ asset('assets/js/charts/gd-default.js?ver=3.1.0') }}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </body>

</html>