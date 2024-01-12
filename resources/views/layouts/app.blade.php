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
        <h1 class="font-medium text-2xl mb-5 mt-4">
            @yield('header')
        </h1>
        @yield('content')
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('canceled'))
            <div class="alert alert-warning">
                {{ session('canceled') }}
            </div>
        @endif

        @if (session('info'))
            <div class="alert alert-info">
                {{ session('info') }}
            </div>
        @endif

    </div>
</body>

</html>
