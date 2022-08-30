<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dermaga Kayu Bangkoa Dashboard | Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');
    setColors(color);" :class="{ 'dark': isDark }">
        <!-- Loading screen -->
        <div x-ref="loading"
            class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-blue-900">
            Loading.....
        </div>
        <div
            class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Brand -->
            <a href="../index.html"
                class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-blue-900 dark:text-blue-100">
                Dermaga Kayu Bangkoa
            </a>
            <main>
                <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-white rounded-md dark:bg-gray-800">
                    <h1 class="text-xl font-semibold text-center">Register</h1>
                    <x-jet-validation-errors class="mb-4 text-center mx-auto" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('register') }}" class="space-y-6" method="POST">
                        @csrf
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-900"
                            type="text" name="name" placeholder="Username" required />
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-900"
                            type="email" name="email" placeholder="Email address" required />
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-900"
                            type="password" name="password" placeholder="Password" required />
                        <input
                            class="w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-900"
                            type="password" name="password_confirmation" placeholder="Confirm Password" required />
                        {{-- <div class="flex items-center justify-between">
                            <!-- Remember me toggle -->
                            <label class="flex items-center">
                                <div class="relative inline-flex items-center">
                                    <input type="checkbox" name="accept_terms"
                                        class="w-10 h-4 transition bg-gray-200 border-none rounded-full shadow-inner outline-none appearance-none toggle checked:bg-blue-600 disabled:bg-gray-200 focus:outline-none" />
                                    <span
                                        class="absolute top-0 left-0 w-4 h-4 transition-all transform scale-150 bg-white rounded-full shadow-sm"></span>
                                </div>
                                {{-- <span class="ml-3 text-sm font-normal text-gray-500 dark:text-gray-400">
                                    I accept the
                                    <a href="#" class="text-sm text-blue-600 hover:underline">Terms and
                                        Conditions</a>
                                </span> --}}
                            </label>
                        </div> --}}
                        <div>
                            <button type="submit"
                                class="w-full px-4 py-2 font-medium text-center text-white transition-colors duration-200 rounded-md bg-blue-600 hover:bg-blue-600-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-1 dark:focus:ring-offset-darker">
                                Register
                            </button>
                        </div>
                    </form>

                    <!-- Login link -->
                    <div class="text-sm text-gray-600 dark:text-gray-400">
                        Already have an account? <a href="{{ route('login') }}"
                            class="text-blue-600 hover:underline">Login</a>
                    </div>
                </div>
            </main>
        </div>
        <!-- Toggle dark mode button -->
        <div class="fixed bottom-5 left-5">
            <button aria-hidden="true" @click="toggleTheme"
                class="p-2 transition-colors duration-200 rounded-full shadow-md bg-blue-600 hover:bg-blue-900 focus:outline-none focus:ring focus:ring-primary">
                <svg x-show="isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                </svg>
                <svg x-show="!isDark" class="w-8 h-8 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                </svg>
            </button>
        </div>
    </div>

    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            const getColor = () => {
                if (window.localStorage.getItem('color')) {
                    return window.localStorage.getItem('color')
                }
                return 'cyan'
            }

            const setColors = (color) => {
                const root = document.documentElement
                root.style.setProperty('--color-primary', `var(--color-${color})`)
                root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
                root.style.setProperty('--color-blue-400', `var(--color-${color}-100)`)
                root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
                root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
                root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
                root.style.setProperty('--color-blue-900', `var(--color-${color}-darker)`)
                this.selectedColor = color
                window.localStorage.setItem('color', color)
            }

            return {
                loading: true,
                isDark: getTheme(),
                color: getColor(),
                selectedColor: 'cyan',
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
                setColors,
            }
        }
    </script>
</body>

</html>
