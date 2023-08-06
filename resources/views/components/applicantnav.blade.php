<nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Photograph permit
                system</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul
                class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">

                <li>
                    <a href="/applicant"
                        class="block py-2 pl-3 pr-4 {{ request()->is('applicant') ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : '' }} md:p-0 dark:text-white"
                        aria-current="page">Apply</a>
                </li>
                <li>
                    <a href="/applicant/applications"
                        class="block py-2 pl-3 pr-4 {{ request()->is('applicant/applications') ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : '' }} md:p-0 dark:text-white"
                        aria-current="page">Applications</a>
                </li>
                <li>
                    <a href="/applicant/payments"
                        class="block py-2 pl-3 pr-4 {{ request()->is('applicant/payments') ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : '' }} md:p-0 dark:text-white">Payments</a>
                </li>
                <li>
                    <a href="/applicant/settings"
                        class="block py-2 pl-3 pr-4 {{ request()->is('applicant/settings') ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:dark:text-blue-500' : '' }} md:p-0 dark:text-white">Settings</a>
                </li>
                <li>
                    <a href="/logout"
                        class="block py-2 pl-3 pr-4 text-red-700 rounded hover:bg-red-400 md:hover:bg-transparent md:border-0 md:hover:text-red-700 md:p-0 dark:text-red-800 md:dark:hover:text-red-500 dark:hover:bg-red-700 dark:hover:text-red-800 md:dark:hover:bg-transparent">Logout</a>
                </li>
                <li>
                    <div class="flex items-center">
                        <button id="theme-toggle" type="button"
                            class="block py-2 pl-3 pr-4 md:p-0 dark:text-white md:dark:text-blue-500">
                            <svg id="theme-toggle-dark-icon" class="hidden w-0 h-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-0 h-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            </svg>
                            <a href="#" class="block text-gray-900 rounded md:bg-transparent  dark:text-white"
                                aria-current="page">Theme</a>
                        </button>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>