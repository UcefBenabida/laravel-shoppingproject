<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="/../jquery/jquery.js"></script>
    @yield('style-links')
    @yield('style')
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
    @yield('javascript')
</body>
</html>