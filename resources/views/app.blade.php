<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <meta name="keywords" content="HTML,CSS,PHP">
    <meta name="author" content="Gwendal Lefort, Johann Dumoulin, Thomas Ghignon">
    <title>@yield('title')</title>

    @stack('style')
</head>
<body data-content="@yield('attribute')">
    @include('layout.nav')
    {{--@include('layout.registration')--}}

    @if (\Request::is('/'))
      @include('layout.header')
    @endif

    @yield('content')

    @include('layout.footer')

<!-- Temporary -->
    @if (\Request::is('/'))
      {{--@include('layout.connexion')--}}

      @include('layout.modalProfil')
    @endif
<!-- -->

    @stack('script')
</body>
</html>
