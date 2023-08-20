<section id="up" class="hero bg-center bg-fixed bg-no-repeat bg-center bg-cover h-[86vh]">
    <!-- Overlay Background + Center Control -->
    <div class="h-full bg-opacity-20 bg-black flex items-center justify-center" style="background:rgba(0,0,0,0.5);">
        <div class="text-center">
            <h1 class="text-ClearBlue font-extrabold text-3xl md:text-5xl mb-3.5">
                Hire Hub
            </h1>
            <h2 class="text-gray-200 font-extrabold text-2xl md:text-4xl leading-tight">
                Where job seekers meet their match.</br> Find your dream job with us today !
            </h2>
        
            <form action="{{ route('listings.index') }}" method="get" class="w-full mt-12">
                @csrf
                <div class="relative flex p-1 rounded-full bg-white border border-ClearBlue shadow-md md:p-2">
                    <input id="s" name="s" placeholder="Job title, company, location or keyword" class="w-full p-4 rounded-full" type="text" value="{{ request()->get('s') }}">
                    <button type="submit" title="Search" class="ml-auto py-3 px-6 rounded-full text-center text-white uppercase transition-all duration-300 bg-ClearBlue outline-none hover:shadow-md focus:outline-none ease-in md:px-12">
                        <span class="hidden font-semibold md:block">
                            Search
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 mx-auto text-yellow-900 md:hidden" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-white flex flex-col justify-start items-start max-w-2xl">
                <h4 class="text-xl md:text-2xl">Search By Tag</h4>
                <div class="mt-3 flex justify-start flex-wrap gap-2">
                    @foreach ($tags as $tag)
                        <a href="{{ route('listings.index', ['tag' => $tag->slug]) }}" class="inline-block tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-blue-600 uppercase rounded-lg {{ $tag->slug == request()->get('tag') ? 'bg-ClearBlue text-white' : 'text-ClearBlue bg-gray-100' }}">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
