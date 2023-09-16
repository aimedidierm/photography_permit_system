<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{env('APP_NAME')}}</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <nav class="bg-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex">
                <img src="/inteko_logo.png" class="h-8 mr-3" alt="{{env(" APP_NAME")}} Logo" />
                <a href="#" class="text-black text-xl font-bold">{{env("APP_NAME")}}</a>
            </div>
            <div class="space-x-4">
                <a href="#home" class="text-black">Home</a>
                <a href="#about" class="text-black">About</a>
                <a href="/login" class="text-black">Login</a>
                <a href="/register" class="text-black">Register</a>
            </div>
        </div>
    </nav>
    <div class="h-screen flex justify-center items-center">
        <div class="w-full bg-white rounded-lg  md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 text-center">
            <h2 class="text-3xl font-bold mb-8">Login</h2>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                @if($errors->any())<span
                    class="self-center text-1xl font-semibold whitespace-nowrap text-red-600 dark:text-red-600">{{$errors->first()}}</span>@endif
                <form class="space-y-6" action="/" method="POST">
                    @csrf
                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                        </div>
                        <div class="mt-2">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                        </div>
                        <div class="mt-2">
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign
                            in
                        </button>
                    </div>
                </form>
                <p class="mt-10 text-center text-sm text-gray-500">
                    Not a member?
                    <a href="/register"
                        class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
                </p>
            </div>
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 {{env('APP_NAME')}}</p>
        </div>
    </footer>
</body>

</html>