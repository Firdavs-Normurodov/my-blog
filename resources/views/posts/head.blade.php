<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog - @yield('title')</title>
    @vite('resources/css/app.css')
    @vite('resources/css/bg.css')
    @vite('resources/css/auth.css')

    <style>

    </style>
</head>


<body >
    <div class="content w-full  ">
        @yield('content')
    </div>
</body>

</html>