<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <x-header></x-header>

        <section class="">
            <div class="flex flex-row justify-start flex-shrink-0 bg-white text-black">
                <!-- Sidebar -->
                <div class="flex flex-col top-14 w-14 md:hover:w-[20%] md:w-[20%] bg-ClearBlue text-white transition-all duration-300 z-10 border-none ">
                <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
                    <ul class="flex flex-col py-4 gap-y-4">
                    <li class="px-5 hidden md:block">
                        <div class="flex flex-row items-center h-8">
                        <div class="font-bold tracking-wide text-white uppercase">Dashboard Menu</div>
                        </div>
                    </li>
        
                    <li>
                        <a href="{{ route('company.show', $company) }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 hover:text-white border-l-4 border-transparent hover:border-blue-500 hover:rounded-r-lg pr-6 {{ request()->routeIs('company.show') ? 'active' : 'text-white' }}">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                        </a>
                    </li>
        
                    <li>
                        <a href="{{ route('company.jobs', $company) }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 hover:text-white border-l-4 border-transparent hover:border-blue-500 hover:rounded-r-lg pr-6 {{ request()->routeIs('company.jobs') ? 'active' : 'text-white' }}">
                        <span class="inline-flex justify-center items-center ml-4 relative">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 6.2C5 5.07989 5 4.51984 5.21799 4.09202C5.40973 3.71569 5.71569 3.40973 6.09202 3.21799C6.51984 3 7.07989 3 8.2 3H15.8C16.9201 3 17.4802 3 17.908 3.21799C18.2843 3.40973 18.5903 3.71569 18.782 4.09202C19 4.51984 19 5.07989 19 6.2V21L12 16L5 21V6.2Z" stroke="#ffff" stroke-width="2" stroke-linejoin="round"/>
                            </svg>
                            <span class="absolute md:hidden block px-2 py-0.5 ml-auto -top-3 -right-3 text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">{{ $listings->count() }}</span>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Posted Jobs</span>
                        <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-red-500 bg-red-50 rounded-full">{{ $listings->count() }}</span>
                        </a>
                    </li>
        
                    <li>
                        <a href="{{ route('listings.create') }}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 hover:text-white border-l-4 border-transparent hover:border-blue-500 hover:rounded-r-lg  pr-6">
                        <span class="inline-flex justify-center items-center ml-4">
                            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.3009 13.6949L20.102 3.89742M10.5795 14.1355L12.8019 18.5804C13.339 19.6545 13.6075 20.1916 13.9458 20.3356C14.2394 20.4606 14.575 20.4379 14.8492 20.2747C15.1651 20.0866 15.3591 19.5183 15.7472 18.3818L19.9463 6.08434C20.2845 5.09409 20.4535 4.59896 20.3378 4.27142C20.2371 3.98648 20.013 3.76234 19.7281 3.66167C19.4005 3.54595 18.9054 3.71502 17.9151 4.05315L5.61763 8.2523C4.48114 8.64037 3.91289 8.83441 3.72478 9.15032C3.56153 9.42447 3.53891 9.76007 3.66389 10.0536C3.80791 10.3919 4.34498 10.6605 5.41912 11.1975L9.86397 13.42C10.041 13.5085 10.1295 13.5527 10.2061 13.6118C10.2742 13.6643 10.3352 13.7253 10.3876 13.7933C10.4468 13.87 10.491 13.9585 10.5795 14.1355Z" 
                                stroke="#ffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                        <span class="ml-2 text-sm tracking-wide truncate">Post a Job</span>
                        </a>
                    </li>
        
                    <li>
                        <form action="{{ route('logout') }}" method="post" class="cursor-pointer hover:bg-blue-800 hover:text-white hover:border-blue-500 hover:rounded-r-lg">
                            @csrf
                            <button type="submit" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 text-white hover:text-white border-l-4 border-transparent hover:border-blue-500 hover:rounded-r-lg">
                                <span class="inline-flex ml-4 justify-center items-center">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                </span>
                                <span class="block ml-4 md:ml-2 text-sm tracking-wide truncate">Logout</span>
                            </button>
                        </form>
                    </li>
                    </ul>
                </div>
                </div>
                <!-- ./Sidebar -->
        
                @yield('content')
                    
            </div>
        </section>
        
        <x-footer></x-footer>
    </body>
</html>
