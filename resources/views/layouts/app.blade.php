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
            <div id="alert-sukses"
                class="flex bottom-0 w-full max-w-md right-2 shadow-lg rounded-xl absolute items-center p-4 mb-4 text-lime-800 border-t-4 border-lime-300 bg-lime-50 dark:text-lime-400 dark:bg-gray-800 dark:border-lime-800"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                    viewBox="0 0 24 24" width="512" height="512">
                    <path
                        d="m18.214,9.098c.387.394.381,1.027-.014,1.414l-4.426,4.345c-.783.768-1.791,1.151-2.8,1.151-.998,0-1.996-.376-2.776-1.129l-1.899-1.867c-.394-.387-.399-1.02-.012-1.414.386-.395,1.021-.4,1.414-.012l1.893,1.861c.776.75,2.001.746,2.781-.018l4.425-4.344c.393-.388,1.024-.381,1.414.013Zm5.786,2.902c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-2,0c0-5.514-4.486-10-10-10S2,6.486,2,12s4.486,10,10,10,10-4.486,10-10Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-lime-50 text-lime-500 rounded-lg focus:ring-2 focus:ring-lime-400 p-1.5 hover:bg-lime-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-lime-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-sukses" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif
        @if (session('error'))
            <div id="alert-error"
                class="flex bottom-0 w-full max-w-md right-2 shadow-lg rounded-xl absolute items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800"
                role="alert">

                <svg class="flex-shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1"
                    viewBox="0 0 24 24" width="512" height="512">
                    <path
                        d="m15.707,9.707l-2.293,2.293,2.293,2.293c.391.391.391,1.023,0,1.414-.195.195-.451.293-.707.293s-.512-.098-.707-.293l-2.293-2.293-2.293,2.293c-.195.195-.451.293-.707.293s-.512-.098-.707-.293c-.391-.391-.391-1.023,0-1.414l2.293-2.293-2.293-2.293c-.391-.391-.391-1.023,0-1.414s1.023-.391,1.414,0l2.293,2.293,2.293-2.293c.391-.391,1.023-.391,1.414,0s.391,1.023,0,1.414Zm8.293,2.293c0,6.617-5.383,12-12,12S0,18.617,0,12,5.383,0,12,0s12,5.383,12,12Zm-2,0c0-5.514-4.486-10-10-10S2,6.486,2,12s4.486,10,10,10,10-4.486,10-10Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">
                    {{ session('error') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-error" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
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
    <script>
        setTimeout(() => {
            const alertSukses = document.getElementById('alert-sukses');
            const alertError = document.getElementById('alert-error');

            if (alertSukses) {
                alertSukses.remove();
            }
            if (alertError) {
                alertError.remove();
            }
        }, 10000);
    </script>
</body>

</html>
