@extends('layout')

@section('content')

<x-applicantnav />
<div class="py-11 sm:ml-64">
    <h2 class="p-4 text-2xl font-semibold mb-4">More details about application</h2>
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
                        <select name="rwandan" id="id" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="1" @if($data->rwandan == true) selected @endif>Rwandan</option>
                            <option value="0" @if($data->rwandan == false) selected @endif>Not Rwandan</option>
                        </select>
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="document"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Document</label>
                        <select name="document" id="document" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            <option value="1" @if($data->documentType == 'id') selected @endif>National ID card</option>
                            <option value="0" @if($data->documentType == 'passport') selected @endif>Passport</option>
                        </select>
                    </div>

                    <div class="mb-4 w-1/3">
                        <label for="documentNumber"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Document
                            number(ID or Passport)</label>
                        <input type="text" id="emdocumentNumberail" value="{{$data->documentNumber}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex space-x-4">

                    <div class="mb-4 w-1/3">
                        <label for="placeIssue" class="block text-sm font-medium text-gray-800 dark:text-white">Place
                            Issue</label>
                        <input type="text" id="placeIssue" value="placeIssue" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="dateIssue" class="block text-sm font-medium text-gray-800 dark:text-white">Date
                            Issue</label>
                        <input type="date" id="dateIssue" value="{{$data->dateIssue}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="dateExpiry" class="block text-sm font-medium text-gray-800 dark:text-white">Date
                            Expiry</label>
                        <input type="date" id="dateExpiry" value="{{$data->dateExpiry}}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="profession"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Profession</label>
                        <input type="text" id="profession" value="{{$data->profession}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <h2 class="text-1xl font-semibold mb-4 dark:text-white">Film Project Information</h2>

                <div class="flex space-x-4">
                    <div class="mb-4 w-1/2">
                        <label for="title" class="block text-sm font-medium text-gray-800 dark:text-white">Title</label>
                        <input type="text" id="title" value="{{$data->title}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/2">
                        <label for="genre" class="block text-sm font-medium text-gray-800 dark:text-white">
                            Genre</label>
                        <input type="text" id="genre" value="{{$data->genre}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="mb-4 w-1/3">
                        <label for="shootingDateStart"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Shooting Date Start</label>
                        <input type="date" id="shootingDateStart" value="{{$data->shootingDateStart}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="shootingDateEnd"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Shooting Date End</label>
                        <input type="date" id="shootingDateEnd" value="{{$data->shootingDateEnd}}"
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="stayDuration" class="block text-sm font-medium text-gray-800 dark:text-white">Stay
                            Duration(for non residents)</label>
                        <input type="text" id="stayDuration" value="{{$data->stayDuration}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                    <div class="mb-4 w-1/3">
                        <label for="location" class="block text-sm font-medium text-gray-800 dark:text-white">Location
                            (town,
                            sector)</label>
                        <input type="text" id="location" value="{{$data->location}}" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="mb-4 w-full">
                        <label for="description"
                            class="block text-sm font-medium text-gray-800 dark:text-white">Description</label>
                        <textarea type="text" id="description" disabled
                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{$data->description}}
                    </textarea>
                    </div>
                </div>

                <h2 class="text-1xl font-semibold mb-4 dark:text-white">Reqired files</h2>
                <div class="flex space-x-4">
                    <div class="mb-4 w-1/3">
                        <a href="{{$data->letter}}"
                            class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            application letter</a>
                    </div>
                    <div class="mb-4 w-1/3">
                        <a href="{{$data->recomendation}}"
                            class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            Recomendation</a>
                    </div>
                    <div class="mb-4 w-1/3">
                        <a href="{{$data->rra}}" class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            RRA bill</a>
                    </div>
                </div>
                <div class="flex space-x-4">
                    <div class="mb-4 w-1/3">
                        <a href="{{$data->identification}}"
                            class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            identification</a>
                    </div>
                    <div class="mb-4 w-1/3">
                        <a href="{{$data->CV}}" class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            CV</a>
                    </div>
                    <div class="mb-4 w-1/3">
                        <a href="{{$data->synopsis}}"
                            class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            synopsis</a>
                    </div>
                </div>
                <h2 class="text-1xl font-semibold mb-4 dark:text-white">Additional files</h2>
                <div class="flex space-x-4">
                    <div class="mb-4 w-1/3">
                        @if ($data->ipCertificate != null)
                        <a href="{{$data->ipCertificate}}"
                            class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            Interectual propety certificate</a>
                        @else
                        <span class="block text-sm font-medium text-blue-600 dark:text-blue-600">No interectual
                            propety certificate</span>
                        @endif
                    </div>
                    <div class="mb-4 w-1/3">
                        @if ($data->card != null)
                        <a href="{{$data->card}}"
                            class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            Service card</a>
                        @else
                        <span class="block text-sm font-medium text-blue-600 dark:text-blue-600">No
                            Service card</span>
                        @endif
                    </div>
                    <div class="mb-4 w-1/3">
                        @if ($data->other != null)
                        <a href="{{$data->other}}"
                            class="block text-sm font-medium text-blue-600 dark:text-blue-600">Open
                            other document</a>
                        @else
                        <span class="block text-sm font-medium text-blue-600 dark:text-blue-600">No other
                            document</span>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
    <br>
</div>
@stop