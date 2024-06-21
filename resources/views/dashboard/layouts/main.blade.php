<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
    <title>Dashboard</title>
</head>

<body>
    @include('dashboard.layouts.navbar')
    @include('dashboard.layouts.sidebar')
    <div class="ml-[18rem] mt-8 mr-14">
        @yield('container')
    </div>
</body>

</html>
