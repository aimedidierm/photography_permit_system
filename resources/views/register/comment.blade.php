@extends('layout')

@section('content')
<x-registernav />
<div class="py-11 sm:ml-64">
    <div class="flex justify-between">
        <h2 class="text-2xl font-semibold p-4 mb-4">Add comment to reject application</h2>
    </div>
    <div class="px-4">

        <form action="{{ url()->current() }}" method="post">
            @csrf
            <textarea id="message" name="message" rows="4" required
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Leave a comment..."></textarea>
            <br>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
</div>
@stop