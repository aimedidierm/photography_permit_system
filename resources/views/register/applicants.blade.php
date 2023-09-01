@extends('layout')

@section('content')
<x-registernav />
<h2 class="text-2xl font-semibold p-4 mb-4">All Applicants accounts</h2>
<div class="px-4">
    <div class="bg-white dark:bg-gray-700 rounded-lg p-4 shadow-md w-full">

        <h2 class="text-1xl font-semibold mb-2 dark:text-white">Applicants accounts</h2>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone
                    </th>
                    <th scope="col"
                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-600">
                @if ($data->isEmpty())
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap" colspan="5">There is no any rester</td>
                </tr>
                @else
                @foreach ($data as $register)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{$register->created_at}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$register->name}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$register->email}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{$register->phone}}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        {{-- <a href="/register/application/{{$register->id}}"
                            class="font-medium text-blue-700 dark:text-blue-700 hover:underline">More details</a> --}}
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div id="defaultModal" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Create new register account
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="defaultModal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <div class="p-6 space-y-6">

                        <form action="/applicant/payments" method="POST">
                            @csrf
                            <input type="hidden" name="id" id="payId">
                            <div class=" mb-6">
                                <label for="payTitle"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Application</label>
                                <input type="text" id="payTitle"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    disabled>
                            </div>
                            <div class="mb-6">
                                <label for="payPrice"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Price</label>
                                <input type="text" id="payPrice" disabled
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <div class="mb-6">
                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Billing number</label>
                                <input type="text" id="phone" name="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    required>
                            </div>
                            <br>
                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Make
                                payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop