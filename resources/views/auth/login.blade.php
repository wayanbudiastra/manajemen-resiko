<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tw-elements/dist/css/index.min.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <title>Login</title>

</head>

<body>
    <section class="h-screen">
        <div class="px-6 h-full text-gray-800">
            <div class="flex xl:justify-center lg:justify-between justify-center items-center flex-wrap h-full g-6">
                <div class="grow-0 shrink-1 md:shrink-0 basis-auto xl:w-6/12 lg:w-6/12 md:w-9/12 mb-12 md:mb-0">
                    <img src="{{ asset('images/data-reports.png') }}" class="w-full" alt="Sample image" />
                </div>
                <div class="xl:ml-20 xl:w-5/12 lg:w-5/12 md:w-8/12 mb-12 md:mb-0">
                    <p class="text-2xl">Risk Register 1.0</p>
                    <form method="POST" action="{{ route('login') }}"">
                        @csrf
                        <div class=" flex flex-row items-center justify-center lg:justify-start">


                </div>
                <!-- Email input -->
                <div class="mb-4" :status="session('status')">
                    @if (session()->has('error'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class="font-medium">Danger alert!</span> {{ session('error') }}
                    </div>
                    @endif

                    @if (session()->has('errors'))
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
                        role="alert">
                        <span class="font-medium">Danger alert!</span>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="mb-6 mt-4">
                    <input type="email"
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="email" name="email" :value="old('email')" required autofocus />
                </div>
                <!-- Password input -->
                <div class="mb-6">
                    <input type="password"
                        class="form-control block w-full px-4 py-2 text-xl font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                        id="password" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="flex justify-between items-center mb-6">
                    <div class="form-group form-check">
                        <input type="checkbox" name="remember"
                            class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer"
                            id="exampleCheck2" />
                        <label class="form-check-label inline-block text-gray-800" for="exampleCheck2">Remember
                            me</label>
                    </div>

                </div>

                <div class="text-center lg:text-left">
                    <button type="submit"
                        class="inline-block px-7 py-3 bg-green-600 text-white font-medium text-sm leading-snug uppercase rounded shadow-md hover:bg-green-900 hover:shadow-lg focus:bg-green-900 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out">
                        Login
                    </button>
                </div>
                </form>
            </div>
        </div>
        </div>
    </section>
</body>

</html>