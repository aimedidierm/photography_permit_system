@extends('layout')

@section('content')

<x-applicantnav />
<div class="py-11 sm:ml-64">
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
                            <option value="id">National ID card</option>
                            <option value="passport">Passport</option>
                        </select>
                    </div>

                    <div class="mb-4 w-1/3">
                        <label for="documentNumber"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Document
                            number(ID or Passport)</label>
                        <input type="text" id="emdocumentNumberail" name="documentNumber" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex space-x-4">

                    <div class="mb-4 w-1/3">
                        <label for="placeIssue" class="block text-sm font-medium text-gray-800 dark:text-white">Place
                            Issue</label>
                        <input type="text" id="placeIssue" name="placeIssue" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="dateIssue" class="block text-sm font-medium text-gray-800 dark:text-white">Date
                            Issue</label>
                        <input type="date" id="dateIssue" name="dateIssue" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="dateExpiry" class="block text-sm font-medium text-gray-800 dark:text-white">Date
                            Expiry</label>
                        <input type="date" id="dateExpiry" name="dateExpiry"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="profession"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Profession</label>
                        <input type="text" id="profession" name="profession" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <h2 class="text-1xl font-semibold mb-4 dark:text-white">Film Project Information</h2>
                <div class="flex space-x-4">
                    <div class="mb-4 w-1/2">
                        <label for="title" class="block text-sm font-medium text-gray-800 dark:text-white">Title</label>
                        <input type="text" id="title" name="title" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>

                    <div class="mb-4 w-1/2">
                        <label for="genre" class="block text-sm font-medium text-gray-800 dark:text-white">
                            Genre</label>
                        <input type="text" id="genre" name="genre" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="mb-4 w-1/3">
                        <label for="shootingDateStart"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Shooting Date Start</label>
                        <input type="date" id="shootingDateStart" name="shootingDateStart" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="shootingDateEnd"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Shooting Date End</label>
                        <input type="date" id="shootingDateEnd" name="shootingDateEnd"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="stayDuration" class="block text-sm font-medium text-gray-800 dark:text-white">Stay
                            Duration(for non residents)</label>
                        <input type="text" id="stayDuration" name="stayDuration"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="location" class="block text-sm font-medium text-gray-800 dark:text-white">Location
                            (town,
                            sector)</label>
                        <input type="text" id="location" name="location" required
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
                        <input type="file" name="letter" id="letter" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="recomendation"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Recomendation</label>
                        <input type="file" name="recomendation" id="recomendation" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="rra" class="block text-sm font-medium text-gray-800 dark:text-white">RRA
                            bill</label>
                        <input type="file" name="rra" id="rra" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="mb-4 w-1/3">
                        <label for="identification"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Identification
                        </label>
                        <input type="file" name="identification" id="identification" required
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="CV" class="block text-sm font-medium text-gray-800 dark:text-white">CV</label>
                        <input type="file" name="CV" id="CV"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="synopsis"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Synopsis</label>
                        <input type="file" name="synopsis" id="synopsis"
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
                            card(Journalist)</label>
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
</div>
@stop