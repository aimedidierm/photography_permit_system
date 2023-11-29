@extends('layout')

@section('content')
<x-boardnav />
<div class="py-11 sm:ml-64">
    <div class=" flex items-center justify-center p-8">
        <div class="bg-white dark:bg-gray-700 rounded-lg p-8 shadow-md w-full">
            <h2 class="text-2xl font-semibold mb-4 dark:text-white">Update your details</h2>
            @if($errors->any())<span
                class="self-center text-1xl font-semibold whitespace-nowrap text-red-600 dark:text-red-600">{{$errors->first()}}</span>@endif
            <form action="/board/settings" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-800 dark:text-white">Name</label>
                    <input type="text" id="name" name="name" value="{{$data->name}}" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-800 dark:text-white">Email</label>
                    <input type="email" id="email" name="email" value="{{$data->email}}" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-800 dark:text-white">Phone</label>
                    <input type="tel" id="phone" name="phone" value="{{$data->phone}}" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label for="password"
                        class="block text-sm font-medium text-gray-800 dark:text-white">Password</label>
                    <input type="password" id="password" name="password" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-800 dark:text-white">Confirm
                        password</label>
                    <input type="password" id="password" name="confirmPassword" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="flex items-center justify-end">
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Update Details
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
@stop