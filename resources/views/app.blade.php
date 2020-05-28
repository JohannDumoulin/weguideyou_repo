<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width"/>
    <meta name="keywords" content="HTML,CSS,PHP">
    <meta name="author" content="Gwendal Lefort, Johann Dumoulin,Thomas Ghignon">
    <title>@yield('title')</title>

    @stack('style')
</head>
<body>
    @include('layout.nav')

    @yield('content')

    @stack('script')
</body>
</html>
