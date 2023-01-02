<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('frontend.includes.styles')
    @yield('styles')
    <title> GoandPlay </title>
<body>
@include('frontend.includes.navbar')
@yield('content')
@include('frontend.includes.language-bar')
@include('frontend.includes.scripts')
</body>
</head>
</html>
