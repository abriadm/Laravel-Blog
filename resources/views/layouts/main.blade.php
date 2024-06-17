<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>{{ $title }}</title>
</head>

<body>

    @include('partials.navbar')

    <div class="px-[20%] mt-8 flex flex-col items-center">
        @yield('container')
    </div>
</body>

</html>
