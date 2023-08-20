<x-app-layout>
    {{-- Candidates listings Section --}}
    <section class="container md:mx-auto py-12 px-5 bg-slate-100">
        <div class="mb-12">
            <h2 class="text-2xl font-bold text-ClearBlue text-center md:text-3xl">All Available Candidates ({{ $candidates->count() }})</h2>
            <hr class="w-full mt-2 h-1 mx-auto bg-ClearBlue border-0 rounded ">
        </div>
        <div class="-my-6 flex flex-wrap gap-y-3 mb-4">                
            @forelse($candidates as $candidate)
                <div class="mx-auto w-full max-w-sm p-6 border-2 border-ClearBlue rounded-lg">
                    <div class="inline-block w-full transform transition-transform duration-300 ease-in-out">
                        <div class="rounded-lg">
                            <div class="flex h-60 justify-center items-center overflow-hidden rounded-lg">
                                <div class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110">
                                    <img src="/storage/{{ $candidate->profile_photo }}" alt="{{ $candidate->first_name }} logo" class="object-cover">
                                </div>
                            </div>
                    
                            <div class="flex flex-col">
                                <div class="mt-4">
                                    <h2 class="line-clamp-1 text-base font-medium text-ClearBlue md:text-lg">{{ $candidate->first_name }} {{ $candidate->last_name }}</h2>
                                    <p class="mt-2 line-clamp-1 text-md text-gray-800" >{{ $candidate->city }}, {{ $candidate->country }}</p>
                                </div>
                        
                                <div class="mt-2 border-t border-gray-400 pt-3">{{ $candidate->about_me }}</div>
                        
                                <div class="mt-2 grid grid-cols-2 grid-rows-2 gap-2 border-b border-t border-gray-400 pb-3 pt-3">
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 32 32" xml:space="preserve"><path d="M13.5 20.5a.5.5 0 0 0 .5-.5v-9.5c0-.827-.673-1.5-1.5-1.5h-8C3.673 9 3 9.673 3 10.5V20a.5.5 0 0 0 1 0v-9.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5V20a.5.5 0 0 0 .5.5zm17.35-.633a.5.5 0 0 0 .328-.626l-2.873-9.188A1.494 1.494 0 0 0 26.873 9h-6.468c-.66 0-1.251.442-1.438 1.074l-2.747 9.284a.501.501 0 0 0 .48.642.5.5 0 0 0 .479-.358l2.747-9.284a.503.503 0 0 1 .479-.358h6.468c.22 0 .411.141.477.351l2.873 9.188a.5.5 0 0 0 .627.328z"/><path d="M5.5 18.5a.5.5 0 0 0-.5.5v11.5c0 .827.673 1.5 1.5 1.5h4c.827 0 1.5-.673 1.5-1.5V19a.5.5 0 0 0-1 0v11.5a.5.5 0 0 1-.5.5H9V21a.5.5 0 0 0-1 0v10H6.5a.5.5 0 0 1-.5-.5V19a.5.5 0 0 0-.5-.5zm21.5 12V23h1.817a.498.498 0 0 0 .481-.633l-1.048-3.818a.5.5 0 0 0-.964.264L28.162 22H26.5a.5.5 0 0 0-.5.5v8a.5.5 0 0 1-.5.5H24v-9a.5.5 0 0 0-1 0v9h-1.5a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 0-.5-.5h-1.4l.884-3.384a.5.5 0 1 0-.967-.253l-1.048 4.01a.502.502 0 0 0 .484.627H20v7.5c0 .827.673 1.5 1.5 1.5h4c.827 0 1.5-.673 1.5-1.5zm-15.317-27c0-1.93-1.57-3.5-3.5-3.5s-3.5 1.57-3.5 3.5S6.253 7 8.183 7s3.5-1.57 3.5-3.5zm-6 0c0-1.378 1.122-2.5 2.5-2.5s2.5 1.122 2.5 2.5S9.561 6 8.183 6s-2.5-1.122-2.5-2.5zM23.64 7c1.93 0 3.5-1.57 3.5-3.5S25.57 0 23.64 0s-3.5 1.57-3.5 3.5S21.71 7 23.64 7zm0-6c1.378 0 2.5 1.122 2.5 2.5S25.019 6 23.64 6s-2.5-1.122-2.5-2.5S22.262 1 23.64 1z"/>
                                        </svg>
                                        <span class="xl:mt-0"> {{ $candidate->gender }} </span>
                                    </p>
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2 9c0-1.886 0-2.828.586-3.414C3.172 5 4.114 5 6 5h12c1.886 0 2.828 0 3.414.586C22 6.172 22 7.114 22 9c0 .471 0 .707-.146.854C21.707 10 21.47 10 21 10H3c-.471 0-.707 0-.854-.146C2 9.707 2 9.47 2 9Zm0 9c0 1.886 0 2.828.586 3.414C3.172 22 4.114 22 6 22h12c1.886 0 2.828 0 3.414-.586C22 20.828 22 19.886 22 18v-5c0-.471 0-.707-.146-.854C21.707 12 21.47 12 21 12H3c-.471 0-.707 0-.854.146C2 12.293 2 12.53 2 13v5Z" fill="#222"/><path d="M7 3v3m10-3v3" stroke="#222" stroke-width="2" stroke-linecap="round"/></svg>
                                        <span class="mt-0"> {{ $candidate->created_at }} </span>
                                    </p>
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m7.18 10.27 6.504 6.46c.697-.807 5.11-5.538 7.316.924 0 0-.232 3.346-4.994 3.346-3.367 0-6.851-4.038-9.29-6.346C4.626 12.692 3 10.154 3 7.846 3 3.116 6.252 3 6.252 3c7.432 2.538.929 7.27.929 7.27Z" fill="#000"/></svg>
                                        <span class="mt-0">{{ $candidate->phone }}</span>
                                    </p>
                                    <p class="flex items-center text-gray-800 xl:flex-row xl:items-center">
                                        <svg class="mr-3 inline-block h-5 w-5 fill-current text-gray-800 xl:h-4 xl:w-4" viewBox="0 0 32 32" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg"><path d="M24.16 14.21 24.1 14l-.1-.12-.12-.14a.9.9 0 0 0-1.3 0l-.12.14-.08.16a1.26 1.26 0 0 0 0 .18.6.6 0 0 0 0 .18.91.91 0 0 0 .06.35.94.94 0 0 0 .2.3.81.81 0 0 0 .3.2 1 1 0 0 0 .36.07h.18l.18-.06.16-.08a.59.59 0 0 0 .08-.18.81.81 0 0 0 .2-.3.91.91 0 0 0 .07-.35 1.22 1.22 0 0 0-.01-.14ZM26 10.52l-.06-.18-.08-.16-.12-.18a.9.9 0 0 0-1.3 0l-.12.14-.08.16a1.26 1.26 0 0 0 0 .18.6.6 0 0 0 0 .18.91.91 0 0 0 .06.35.94.94 0 0 0 .2.3.81.81 0 0 0 .3.2 1 1 0 0 0 .36.07h.18l.18-.06.16-.08a.59.59 0 0 0 .14-.12.81.81 0 0 0 .2-.3.91.91 0 0 0-.02-.32 1.22 1.22 0 0 0 0-.18ZM21.39 5.9l-.06-.18-.08-.16-.12-.14a.9.9 0 0 0-1.3 0l-.12.14-.08.16a1.26 1.26 0 0 0 0 .18.6.6 0 0 0 0 .18.91.91 0 0 0 .06.35.94.94 0 0 0 .2.3.81.81 0 0 0 .3.2 1 1 0 0 0 .36.07h.18l.18-.06.09-.09a.59.59 0 0 0 .14-.12.81.81 0 0 0 .2-.3.91.91 0 0 0 .07-.35 1.22 1.22 0 0 0-.02-.18Zm-3.7 3.69-.06-.18-.08-.16-.12-.14a.9.9 0 0 0-1.3 0l-.13.15-.08.16a1.26 1.26 0 0 0 0 .18.6.6 0 0 0 0 .18.91.91 0 0 0 .06.35.94.94 0 0 0 .2.3.81.81 0 0 0 .3.2 1 1 0 0 0 .36.07h.18l.18-.06.16-.08a.59.59 0 0 0 .14-.12.81.81 0 0 0 .2-.3.91.91 0 0 0 .07-.35 1.22 1.22 0 0 0-.08-.2ZM12.15 5.9l-.06-.18-.09-.15-.12-.14a.9.9 0 0 0-1.3 0l-.12.14-.08.16a1.26 1.26 0 0 0 0 .18.6.6 0 0 0 0 .18.91.91 0 0 0 .06.35.94.94 0 0 0 .2.3.81.81 0 0 0 .3.2 1 1 0 0 0 .36.07h.18l.18-.06.16-.08a.59.59 0 0 0 .14-.12.81.81 0 0 0 .2-.3.91.91 0 0 0 .07-.35 1.22 1.22 0 0 0-.08-.2Zm5.37 18.52a.92.92 0 0 0-.25-.86l-9.13-9.14a.92.92 0 0 0-1.53.36L2 28.49a.92.92 0 0 0 1.17 1.17l13.7-4.57a.92.92 0 0 0 .65-.67Zm-7.43 1-3.8-3.81.5-1.5 4.81 4.81Zm-4.46-1.85 2.5 2.5-3.75 1.25Zm7.92.7-6.11-6.12.45-1.36 7 7Zm5.7-9.45.43-2.51 2.51-.43a.92.92 0 0 0 .75-.75l.43-2.51 2.51-.43a.92.92 0 0 0-.31-1.82l-3.15.54a.92.92 0 0 0-.75.75l-.43 2.51-2.51.43a.92.92 0 0 0-.75.75l-.43 2.51-2.55.44a.92.92 0 0 0 .16 1.83h.16l3.15-.54a.92.92 0 0 0 .78-.77Zm10.15 1.05-2.66-1a.92.92 0 0 0-1.13.41l-1 1.79-1.92-.72a.92.92 0 0 0-1.13.41l-1 1.78-1.92-.72a.92.92 0 1 0-.64 1.73l2.66 1a.92.92 0 0 0 1.13-.41l1-1.79 1.92.72a.92.92 0 0 0 1.13-.41l1-1.79 1.92.72a.92.92 0 0 0 .65-1.73ZM14.54 11l-.7-1.93 1.79-1a.92.92 0 0 0 .42-1.12L15.36 5l1.79-1a.92.92 0 0 0-.89-1.62l-2.48 1.4a.92.92 0 0 0-.42 1.12l.7 1.92-1.79 1a.92.92 0 0 0-.42 1.12l.7 1.93-1.8 1a.92.92 0 1 0 .89 1.62l2.49-1.37a.92.92 0 0 0 .41-1.12ZM7.55 9.67a.92.92 0 0 0-.63 1.14l.38 1.31a.92.92 0 0 0 .88.66.91.91 0 0 0 .26 0 .92.92 0 0 0 .63-1.14l-.38-1.31a.92.92 0 0 0-1.14-.66Zm7.11 9.58a.92.92 0 0 0 .53-.17l.54-.38a.92.92 0 1 0-1.07-1.51l-.54.38a.92.92 0 0 0 .53 1.68Zm-3.81-4.73a.92.92 0 0 0 0 1.3l.38.38a.92.92 0 1 0 1.3-1.3l-.38-.38a.92.92 0 0 0-1.3 0ZM21 23.85h.16a.92.92 0 0 0 .11-1.85L19 21.65a.92.92 0 1 0-.31 1.82Z"/>
                                        </svg>
                                        <span class="mt-0">{{ $candidate->birthday }}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-xl text-center text-gray-700">No Candidates Found !!!</p>
            @endforelse
        </div>
        {{ $candidates->links() }} <!-- Display pagination links -->
    </section>
</x-app-layout>