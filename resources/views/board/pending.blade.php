@extends('layout')

@section('content')
<x-boardnav />
<div class="py-11 sm:ml-64">
    <div class="flex justify-between">
        <h2 class="text-2xl font-semibold p-4 mb-4">All pending applications</h2>
    </div>
    <div class="px-4">
        <div class="bg-white dark:bg-gray-700 rounded-lg p-4 shadow-md w-full">

            <h2 class="text-1xl font-semibold mb-2 dark:text-white">All pending application</h2>

            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Title
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Letter
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Details
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-600">
                    @if ($data->isEmpty())
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap" colspan="6">You didn't have any application</td>
                    </tr>
                    @else
                    @foreach ($data as $application)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$application->created_at}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$application->title}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{$application->letter}}" target="_blank"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Open</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$application->status}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="/board/application/{{$application->id}}"
                                class="font-medium text-blue-700 dark:text-blue-700 hover:underline">More details</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="/board/application/approve/{{$application->id}}"
                                class="font-medium text-blue-700 dark:text-blue-700 hover:underline">Approve</a>
                            <a href="/board/application/reject/{{$application->id}}"
                                class="font-medium text-red-700 dark:text-red-700 hover:underline">Reject</a>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@stop