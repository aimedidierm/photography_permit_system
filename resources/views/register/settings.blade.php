@extends('layout')

@section('content')
<x-registernav />
<div class="min-h-screen flex items-center justify-center">
    <div class="bg-white dark:bg-gray-700 rounded-lg p-8 shadow-md w-full max-w-xl">
        <h2 class="text-2xl font-semibold mb-4">Update User Details</h2>
        <form>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-800 dark:text-white">Name</label>
                <input type="text" id="name" name="name"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-800 dark:text-white">Email</label>
                <input type="email" id="email" name="email"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="phone" class="block text-sm font-medium text-gray-800 dark:text-white">Phone</label>
                <input type="tel" id="phone" name="phone"
                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-800 dark:text-white">Password</label>
                <input type="password" id="password" name="password"
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
@stop