<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <meta name="keywords" content="HTML,CSS,PHP,JavaScript">
    <meta name="author" content="Gwendal Lefort, Johann Dumoulin, Thomas Ghignon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @stack('style')
</head>
<body data-content="@yield('attribute')">
    @include('layout.nav')
    @include('layout.connection')
    @include('layout.modalProfil')

    @include('flashy::message')

    @yield('content')

    @include('layout.footer')

    @stack('script')
</body>
</html>
