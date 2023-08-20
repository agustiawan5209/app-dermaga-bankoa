<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dermaga Kayu Bangkoa Dashboard | Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="{{ asset('build/assets/app.cea81095.css') }}">

</head>

<body class="bg-cover" style="background-image: url({{asset('img/layanan.jpg')}})">
    <div >

        <div
            class="flex flex-col items-center justify-center min-h-screen p-4 space-y-4 antialiased text-gray-900 bg-[#52525254] dark:bg-dark dark:text-light">
            <!-- Brand -->
            <a href="/"
                class="inline-block mb-6 text-3xl font-bold tracking-wider uppercase text-gray-900 dark:text-blue-100">
                Dermaga Kayu Bangkoa
            </a>
            <main>
                <div class="w-full max-w-sm px-4 py-6 space-y-6 bg-[#ffffffc2] shadow-white rounded-md dark:bg-gray-800">
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
                        <select name="role" id="role"
                            class="w-full px-4 py-2 border rounded-md dark:bg-gray-800 dark:border-gray-700 focus:outline-none focus:ring focus:ring-blue-400 dark:focus:ring-blue-900">
                            <option value="1">Pemilik Kapal</option>
                            <option value="3">Pengguna</option>
                        </select>
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
