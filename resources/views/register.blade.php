<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>Register | CBE Bonds</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Tfumela is a bulk messaging service from Onswaziline. Send bulk SMS from the comfort of your home or office to a large number of recipients in Eswatini." name="description">
    <meta content="Onswaziline" name="author">
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}">
    <link href="{{ url('assets/css/app.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ url('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('assets/js/config.js') }}"></script>
    @livewireStyles
    @vite(['resources/js/app.js'])
</head>

<body>

    <div class="bg-gradient-to-r from-white-100 to-white-100 dark:from-gray-700 dark:via-gray-900 dark:to-black">
        <div class="h-screen w-screen flex justify-center items-center">
            <div class="2xl:w-1/4 lg:w-1/3 md:w-1/2 w-full">
                <div class="card overflow-hidden sm:rounded-md rounded-none">
                    <div class="p-6">
                        <a href="index.html" class="block mb-8">
                            <img class="h-6 block dark:hidden" src="assets/images/logo-dark.png" alt="">
                            <img class="h-6 hidden dark:block" src="assets/images/logo-light.png" alt="">
                        </a>
                        <livewire:partials.message/>
                        <form method="POST" action="{{ route('register.store') }}" autocomplete="off" class="mt-2">
                            @csrf

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="LoggingEmailAddress">Full Name</label>
                            <input id="LoggingEmailAddress" name="name" value="{{ old('name') }}" class="form-input" type="text" placeholder="Enter your Name">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="LoggingEmailAddress">Email Address</label>
                            <input id="LoggingEmailAddress" name="email" value="{{ old('email') }}" class="form-input" type="email" placeholder="Enter your email">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="loggingPassword">Password</label>
                            <input id="loggingPassword" name="password" class="form-input" type="password" placeholder="Enter your password">
                        </div>

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-600 dark:text-gray-200 mb-2" for="loggingPassword">Confirm Password</label>
                            <input id="loggingPassword" name="password_confirmation" class="form-input" type="password" placeholder="Confirm password">
                        </div>

                        <div class="flex justify-center mb-6">
                            <button class="btn w-full text-white bg-primary"> Register </button>
                        </div>
                    </form>

                        <p class="text-gray-500 dark:text-gray-400 text-center">Already have account ?<a href="{{ route('login') }}" class="text-primary ms-1"><b>Log In</b></a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @livewireScripts
</body>
</html>
