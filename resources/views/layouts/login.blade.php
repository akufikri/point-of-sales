<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex overflow-hidden">
        <div class="w-full h-screen">
            <div class="flex justify-center items-center h-screen">
                <div class="max-w-2xl w-full">
                    <form class="max-w-sm mx-auto" method="POST" action="/login">
                        @csrf
                        <div class="mb-5">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Email</label>
                            <input name="email" type="email" id="email"
                                class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                placeholder="nama_kamu@gmail.com">
                        </div>
                        <div class="mb-5">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Password</label>
                            <input name="password" type="password" id="password"
                                class="bg-gray-50 transition border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-orange-500 focus:border-orange-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-orange-500 dark:focus:border-orange-500"
                                required>
                        </div>
                        <div class="flex items-start mb-5">
                            <div class="flex items-center h-5">
                                <input id="remember" type="checkbox" value=""
                                    class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-orange-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-orange-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                    required>
                            </div>
                            <label for="remember"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingat Saya</label>
                        </div>
                        <button type="submit"
                            class="text-white bg-orange-400 hover:-rotate-2 hover:bg-orange-500 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-lg text-sm w-full sm:w-auto px-7 transition duration-300 shadow-md py-2.5 text-center dark:bg-orange-600 dark:hover:bg-orange-700 dark:focus:ring-orange-800">Masuk</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="bg-orange-300 w-full h-screen flex items-center justify-center">
            <div class="drop-shadow-2xl">
                <img src="{{ asset('assets/img/logo-login.webp') }}" alt="Logo Login"
                    class="hover:scale-105 duration-300 transition hover:rotate-1 rotate-6">
            </div>
        </div>
    </div>
</body>

</html>
