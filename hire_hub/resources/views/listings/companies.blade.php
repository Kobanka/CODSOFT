<x-app-layout>
    {{-- Companies listings Section --}}
    <section class="container mx-auto py-12 px-5 bg-slate-100">
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-ClearBlue text-center md:text-3xl">All Available Companies ({{ $companies->count() }})</h2>
            <hr class="w-full mt-2 h-1 mx-auto bg-ClearBlue border-0 rounded ">
        </div>
        <div class="-my-6 flex flex-wrap gap-y-3 mb-4">                
            @forelse($companies as $company)
                <div class="mx-auto w-full max-w-sm p-6 border-2 border-ClearBlue rounded-lg">
                    <div class="inline-block w-full transform transition-transform duration-300 ease-in-out">
                        <div class="rounded-lg">
                            <div class="flex h-60 justify-center items-center overflow-hidden rounded-lg">
                                <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                                    <img src="/storage/{{ $company->profile_photo }}" alt="{{ $company->name }} logo" class="object-cover">
                                </div>
                            </div>
                    
                            <div class="flex flex-col">
                                <div class="mt-4">
                                    <h2 class="line-clamp-1 text-base font-medium text-ClearBlue md:text-lg">{{ $company->name }}</h2>
                                    <p class="mt-2 line-clamp-1 text-md text-gray-800" >{{ $company->city }}, {{ $company->country }}</p>
                                </div>
                        
                                <div class="mt-2 border-t border-gray-400 pt-3">{{ $company->about_comp }}</div>
                        
                                <div class="mt-2 grid grid-cols-2 grid-rows-2 gap-2 border-b border-t border-gray-400 pb-3 pt-3">
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M18 7.16a.605.605 0 0 0-.19 0 2.573 2.573 0 0 1-2.48-2.58c0-1.43 1.15-2.58 2.58-2.58a2.58 2.58 0 0 1 2.58 2.58A2.589 2.589 0 0 1 18 7.16Zm-1.03 7.28c1.37.23 2.88-.01 3.94-.72 1.41-.94 1.41-2.48 0-3.42-1.07-.71-2.6-.95-3.97-.71M5.97 7.16c.06-.01.13-.01.19 0a2.573 2.573 0 0 0 2.48-2.58C8.64 3.15 7.49 2 6.06 2a2.58 2.58 0 0 0-2.58 2.58c.01 1.4 1.11 2.53 2.49 2.58ZM7 14.44c-1.37.23-2.88-.01-3.94-.72-1.41-.94-1.41-2.48 0-3.42 1.07-.71 2.6-.95 3.97-.71M12 14.63a.605.605 0 0 0-.19 0 2.573 2.573 0 0 1-2.48-2.58c0-1.43 1.15-2.58 2.58-2.58a2.58 2.58 0 0 1 2.58 2.58c-.01 1.4-1.11 2.54-2.49 2.58Zm-2.91 3.15c-1.41.94-1.41 2.48 0 3.42 1.6 1.07 4.22 1.07 5.82 0 1.41-.94 1.41-2.48 0-3.42-1.59-1.06-4.22-1.06-5.82 0Z" stroke="#292D32" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                        <span class="xl:mt-0"> {{ $company->people }} </span>
                                    </p>
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg"><g data-name="Layer 2"><path fill="none" data-name="invisible box" d="M0 0h48v48H0z"/><path d="M24 2a2.1 2.1 0 0 0-1.7 1l-9.1 14a2.3 2.3 0 0 0 0 2 1.9 1.9 0 0 0 1.7 1H33a2.1 2.1 0 0 0 1.7-1 1.8 1.8 0 0 0 0-2l-9-14A1.9 1.9 0 0 0 24 2Zm19 41H29a2 2 0 0 1-2-2V27a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2ZM13 24a10 10 0 1 0 10 10 10 10 0 0 0-10-10Z" data-name="icons Q2"/></g></svg>
                                        <span class="mt-0"> {{ $company->category }} </span>
                                    </p>
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m7.18 10.27 6.504 6.46c.697-.807 5.11-5.538 7.316.924 0 0-.232 3.346-4.994 3.346-3.367 0-6.851-4.038-9.29-6.346C4.626 12.692 3 10.154 3 7.846 3 3.116 6.252 3 6.252 3c7.432 2.538.929 7.27.929 7.27Z" fill="#000"/></svg>
                                        <span class="mt-0">{{ $company->phone }}</span>
                                    </p>
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 9c0-1.886 0-2.828.586-3.414C3.172 5 4.114 5 6 5h12c1.886 0 2.828 0 3.414.586C22 6.172 22 7.114 22 9c0 .471 0 .707-.146.854C21.707 10 21.47 10 21 10H3c-.471 0-.707 0-.854-.146C2 9.707 2 9.47 2 9Zm0 9c0 1.886 0 2.828.586 3.414C3.172 22 4.114 22 6 22h12c1.886 0 2.828 0 3.414-.586C22 20.828 22 19.886 22 18v-5c0-.471 0-.707-.146-.854C21.707 12 21.47 12 21 12H3c-.471 0-.707 0-.854.146C2 12.293 2 12.53 2 13v5Z" fill="#222"/><path d="M7 3v3m10-3v3" stroke="#222" stroke-width="2" stroke-linecap="round"/></svg>
                                        <span class="mt-0">{{ $company->established }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-xl text-center text-gray-700">No Companies Found !!!</p>
            @endforelse
        </div>
        {{ $companies->links() }} <!-- Display pagination links -->
    </section>
</x-app-layout>