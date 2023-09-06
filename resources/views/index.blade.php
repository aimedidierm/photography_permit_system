<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Photograph permit system</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-100">
    {{-- <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Sign in to your
            account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        @if($errors->any())<span
            class="self-center text-1xl font-semibold whitespace-nowrap text-red-600 dark:text-red-600">{{$errors->first()}}</span>@endif
        <form class="space-y-6" action="/" method="POST">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                    <!--<div class="text-sm">
                        <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                    </div>-->
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
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
            <a href="/register" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
        </p>
    </div>
    </div> --}}
    <nav class="bg-green-500 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-xl font-bold">Photograph Permit system</a>
            <div class="space-x-4">
                <a href="#home" class="text-white">Home</a>
                <a href="#about" class="text-white">About</a>
                <a href="#login" class="text-white">Login</a>
                <a href="#register" class="text-white">Register</a>
            </div>
        </div>
    </nav>

    <section id="home" class="bg-cover bg-center h-screen bg-green-900 text-white flex items-center">
        <div class="container mx-auto text-center">
            <img src="camera.png" alt="Photograph Permit" class="mx-auto mb-4">
            <h1 class="text-4xl font-bold mb-2">Welcome to Photograph Permit System</h1>
            <p class="text-lg">Easily obtain permits for your photography projects.</p>
        </div>
    </section>

    <section id="about" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">About Us</h2>
            <p class="text-gray-700 text-lg">
                At Photograph Permit, we are passionate about simplifying the process of obtaining permits for your
                photography projects. Our mission is to provide photographers and creatives with a seamless and
                efficient platform to secure the necessary permissions. With a team of dedicated professionals and a
                user-friendly interface, we strive to make the permit application process as straightforward as
                possible, allowing you to focus on what you do best – capturing moments and creating stunning visuals.
                Join us in this journey to unlock new opportunities and bring your photography visions to life.
            </p>
        </div>
    </section>

    <section id="login" class="py-16 bg-gray-200">
        <div class="container mx-auto text-center">
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
                    <a href="/#register"
                        class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Register</a>
                </p>
            </div>
        </div>
    </section>

    <section id="register" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Register</h2>
            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                @if($errors->any())<span
                    class="self-center text-1xl font-semibold whitespace-nowrap text-red-600 dark:text-red-600">{{$errors->first()}}</span>@endif
                <form class="space-y-6" action="/register" method="POST">
                    @csrf

                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                            <div class="mt-2">
                                <input id="name" name="name" type="text" autocomplete="name" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                            <div class="mt-2">
                                <input id="email" name="email" type="email" autocomplete="email" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Mobile
                            number</label>
                        <div class="mt-2">
                            <input id="email" name="phone" type="number" autocomplete="email" required
                                class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div class="flex space-x-4">
                        <div class="w-1/2">
                            <label for="password"
                                class="block text-sm font-medium leading-6 text-gray-900">Password</label>
                            <div class="mt-2">
                                <input id="password" name="password" type="password" autocomplete="new-password"
                                    required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                        <div class="w-1/2">
                            <label for="confirmPassword"
                                class="block text-sm font-medium leading-6 text-gray-900">Confirm
                                Password</label>
                            <div class="mt-2">
                                <input id="confirmPassword" name="confirmPassword" type="password"
                                    autocomplete="new-password" required
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            </div>
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register
                        </button>
                    </div>
                </form>
                <p class="mt-10 text-center text-sm text-gray-500">
                    Already you are a member?
                    <a href="/#login" class="font-semibold leading-6 text-indigo-600 hover:text-indigo-500">Login</a>
                </p>
            </div>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Photograph Permit System</p>
        </div>
    </footer>
</body>

</html>