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

    <div class="container mx-auto text-center relative">
        <img src="landing_image.jpg" alt="Landing Image" class="w-full h-auto rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold absolute bottom-0 left-0 w-full text-white bg-black bg-opacity-50 p-4">
            Welcome to {{env('APP_NAME')}}
        </h1>
    </div>

    <section id="about" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">About Us</h2>
            <p class="text-gray-700 text-lg">
                At {{env('APP_NAME')}}, we are passionate about simplifying the process of obtaining permits for your
                photography projects. Our mission is to provide photographers and creatives with a seamless and
                efficient platform to secure the necessary permissions. With a team of dedicated professionals and a
                user-friendly interface, we strive to make the permit application process as straightforward as
                possible, allowing you to focus on what you do best – capturing moments and creating stunning visuals.
                Join us in this journey to unlock new opportunities and bring your photography visions to life.
            </p>
        </div>
    </section>

    <footer class="bg-gray-900 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2023 Photograph Permit System</p>
        </div>
    </footer>
</body>

</html>