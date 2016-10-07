<!doctype html>
<html lang=ru>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CPPA</title>
@include('admin.layouts.styles')
</head>

<body>
<header>
    <h1>Admin CPPA</h1>
</header>
<main>
    @yield('content')
</main>

@include('admin.layouts.menu')


<footer>

</footer>
</body>

@include('admin.layouts.scripts')

</html>