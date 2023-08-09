@extends('layout')

@section('content')
<x-registernav />
<h2 class="text-2xl font-semibold p-4 mb-4">All applications</h2>
<div class="px-4">
    <div class="bg-white dark:bg-gray-700 rounded-lg p-4 shadow-md w-full">

        <h2 class="text-1xl font-semibold mb-2 dark:text-white">All application</h2>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 2
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 3
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 4
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Column 5
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-600">
                <!-- Sample table rows -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Data 1</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 2</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 3</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 4</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 5</td>
                    <td class="px-6 py-4 whitespace-nowrap">Data 6</td>
                </tr>
                <!-- Add more rows as needed -->
            </tbody>
        </table>

    </div>
</div>
@stop