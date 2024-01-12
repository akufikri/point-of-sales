<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kasir | @yield('title')</title>
    {{-- Tailwind --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>
    <x-navbar />
    <x-sidebar />
    <div class="p-4 sm:ml-64 bg-[#F7F7F8] h-screen pt-20">
        @yield('content')
    </div>
</body>

</html>
