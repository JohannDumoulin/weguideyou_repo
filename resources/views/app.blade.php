<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <meta name="keywords" content="HTML,CSS,PHP,JavaScript">
    <meta name="author" content="Gwendal Lefort, Johann Dumoulin, Thomas Ghignon">
    <title>@yield('title')</title>

    @stack('style')
</head>
<body data-content="@yield('attribute')">
    @include('layout.nav')
    @include('layout.connection')
    @include('layout.modalProfil')

    @if (\Request::is('/'&&'/particulier'))
      @include('layout.header')
    @endif

    @yield('content')

    @include('layout.footer')

    @stack('script')
</body>
</html>
