@extends('layout')

@section('content')

<x-applicantnav />

<h2 class="p-4 text-2xl font-semibold mb-4">Send application</h2>
@if($errors->any())<span
    class="self-center text-1xl font-semibold whitespace-nowrap dark:text-red-600">{{$errors->first()}}</span>@endif
<div class="flex items-center justify-center px-4">
    <div class="bg-white dark:bg-gray-700 rounded-lg p-8 shadow-md w-full">
        <h2 class="text-1xl font-semibold mb-4 dark:text-white">User Details</h2>
        <form action="/applicant/applications" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex space-x-4">
                <div class="mb-4 w-1/3">
                    <label for="name" class="block text-sm font-medium text-gray-800 dark:text-white">Name</label>
                    <input type="text" id="name" value="{{$user->name}}" disabled
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mb-4 w-1/3">
                    <label for="email" class="block text-sm font-medium text-gray-800 dark:text-white">Email</label>
                    <input type="email" id="email" value="{{$user->email}}" disabled
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>

                <div class="mb-4 w-1/3">
                    <label for="phone" class="block text-sm font-medium text-gray-800 dark:text-white">Phone</label>
                    <input type="number" id="phone" value="{{$user->phone}}" disabled
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div class="flex space-x-4">
                <div class="mb-4 w-1/3">
                    <label for="name"
                        class="block text-sm font-medium text-gray-800 dark:text-white">Nationality</label>
                    <select name="rwandan" id="id"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="1">Rwandan</option>
                        <option value="0">Not Rwandan</option>
                    </select>
                </div>
                <div class="mb-4 w-1/3">
                    <label for="document"
                        class="block text-sm font-medium text-gray-800 dark:text-white">Document</label>
                    <select name="document" id="document"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="1">National ID card</option>
                        <option value="0">Passport</option>
                    </select>
                </div>

                <div class="mb-4 w-1/3">
                    <label for="documentNumber" class="block text-sm font-medium text-gray-800 dark:text-white">Document
                        number</label>
                    <input type="text" id="emdocumentNumberail" name="documentNumber" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <h2 class="text-1xl font-semibold mb-4 dark:text-white">Application Details</h2>

            <div class="flex space-x-4">
                <div class="mb-4 w-1/2">
                    <label for="title" class="block text-sm font-medium text-gray-800 dark:text-white">Title</label>
                    <input type="text" id="title" name="title" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4 w-1/2">
                    <label for="date" class="block text-sm font-medium text-gray-800 dark:text-white">Shooting
                        date</label>
                    <input type="date" id="date" name="date" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div class="flex space-x-4">
                <div class="mb-4 w-full">
                    <label for="description"
                        class="block text-sm font-medium text-gray-800 dark:text-white">Description</label>
                    <textarea type="text" id="description" name="description" required
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                </div>
            </div>

            <h2 class="text-1xl font-semibold mb-4 dark:text-white">Required files</h2>
            <div class="flex space-x-4">
                <div class="mb-4 w-1/3">
                    <label for="letter" class="block text-sm font-medium text-gray-800 dark:text-white">Application
                        letter</label>
                    <input type="file" name="letter" id="letter"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4 w-1/3">
                    <label for="recomendation"
                        class="block text-sm font-medium text-gray-800 dark:text-white">Recomendation</label>
                    <input type="file" name="recomendation" id="recomendation"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4 w-1/3">
                    <label for="rra" class="block text-sm font-medium text-gray-800 dark:text-white">RRA
                        bill</label>
                    <input type="file" name="rra" id="rra"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <h2 class="text-1xl font-semibold mb-4 dark:text-white">Additional files</h2>
            <div class="flex space-x-4">
                <div class="mb-4 w-1/3">
                    <label for="itCertificate"
                        class="block text-sm font-medium text-gray-800 dark:text-white">Interectual
                        propety certificate(Rwandans)</label>
                    <input type="file" name="itCertificate" id="itCertificate"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4 w-1/3">
                    <label for="card" class="block text-sm font-medium text-gray-800 dark:text-white">Service
                        card(Jurnalist)</label>
                    <input type="file" name="card" id="card"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-4 w-1/3">
                    <label for="other" class="block text-sm font-medium text-gray-800 dark:text-white">Other</label>
                    <input type="file" name="other" id="other"
                        class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            </div>
            <div class="flex items-center justify-end">
                <button type="submit"
                    class="px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Send application
                </button>
            </div>
        </form>

    </div>
</div>
@stop