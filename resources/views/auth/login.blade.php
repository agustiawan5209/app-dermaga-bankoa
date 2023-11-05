<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dermaga Kayu Bangkoa Dashboard | Login</title>
    <!-- Styles -->
    @livewireStyles
    {{-- @vite(['resources/js/app.js', 'resources/app/app.css']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app.cea81095.css') }}">
    {{-- <script defer src="{{asset('build/assets/app.cea81095.css')}}"></script> --}}
</head>

<body class="bg-cover" style="background-image: url({{asset('img/layanan.jpg')}})">
    <div>

        <div
            class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-[#52525254] dark:bg-dark dark:text-light">
            <!-- Brand -->
            <a href="/"
                class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-blue-500-dark dark:text-light">
                Dermaga Kayu Bangkoa
            </a>
            <main >
                <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-[#ffffffc2] rounded-md dark:bg-darker shadow-lg">
                    <h1 class="text-xl font-semibold text-center">Login</h1>
                    <x-jet-validation-errors class="mb-4 text-center mx-auto" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" class="space-y-6" method="POST">
                        @csrf
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-blue-500-100 dark:focus:ring-blue-500-darker"
                            type="text" name="auth" placeholder="Email address" required />
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-darker dark:border-gray-700 focus:outline-none focus:ring focus:ring-blue-500-100 dark:focus:ring-blue-500-darker"
                            type="password" name="password" placeholder="Password" required />
                        {{-- <div class="flex items-center justify-between">
                            <!-- Remember me toggle -->
                            <label class="flex items-center">
                                <div class="relative inline-flex items-center">
                                    <input type="checkbox" name="remembr_me"
                                        class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-blue-500-light disabled:bg-gray-200 focus:outline-none" />
                                </div>
                                <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">Remember
                                    me</span>
                            </label>

                            <a href="forgot-password.html" class="text-sm text-blue-600 hover:underline">Forgot
                                Password?</a>
                        </div> --}}
                        <div>
                            <button type="submit"
                                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-blue-500 hover:bg-blue-500-dark focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 dark:focus:ring-offset-darker">
                                Login
                            </button>
                        </div>
                    </form>

                    <!-- Social login links -->
                    <!-- Brand icons src https://boxicons.com -->

                    <!-- Register link -->
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Don't have an account yet? <a href="{{ route('register') }}"
                            class="text-blue-600 hover:underline">Register</a>
                    </div>
                </div>
            </main>
        </div>
        <!-- Toggle dark mode button -->
    </div>

</body>

</html>
