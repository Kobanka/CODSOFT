<x-app-layout>
    {{-- Job detail page --}}
    <section class="bg-slate-100 p-4 md:px-0">
        <div class="flex justify-center items-center gap-y-2 flex-col">
            <div class="flex flex-col justify-center items-center md:w-1/2">
                <div class="flex flex-col items-center text-center">
                    <h3 class="text-2xl md:text-4xl font-bold text-gray-800">{{ $listing->title }}</h3>
                    <p class="text-ClearBlue font-semibold text-lg"> <span class="text-gray-700 font-normal">at</span> {{ $listing->company->name }}</p>
                </div>
                <hr class="w-full mt-5 h-0.5 mx-auto bg-ClearBlue border-0 rounded ">
                <div class="flex flex-row justify-between w-full flex-wrap md:flex-nowrap">
                    <div class="flex flex-col gap-y-1.5 w-1/2 md:w-full">
                        <h4 class="text-md md:text-lg font-semibold text-gray-700">Location:</h4>
                        <p class="text-gray-700 capitalize">{{ $listing->country }}</p>
                    </div>

                    <div class="flex flex-col gap-y-1.5 w-1/2 md:w-full">
                        <h4 class="text-md md:text-lg font-semibold text-gray-700">Experience:</h4>
                        <p class="text-gray-700 capitalize">{{ $listing->experience }}</p>
                    </div>

                    <div class="flex flex-col gap-y-1.5 w-1/2 md:w-full">
                        <h4 class="text-md md:text-lg font-semibold text-gray-700">Deadline:</h4>
                        <p class="text-gray-700">{{ $listing->closing_date }}</p>
                    </div>

                    <div class="flex flex-col gap-y-1.5 w-1/2 md:w-full">
                        <h4 class="text-md md:text-lg font-semibold text-gray-700">Posted:</h4>
                        <p class="text-gray-700">{{ $listing->created_at }}</p>
                    </div>
                </div>
                <hr class="w-full mt-2 h-0.5 mx-auto bg-ClearBlue border-0 rounded ">
            </div>

            <x-alert-error>
                {{ session('error') }}
            </x-alert-error>
            {{-- Additional Information --}}
            <div class="flex flex-col gap-y-4 md:w-1/2">
                <div class="mt-12">
                    <h2 class="text-xl md:text-3xl font-semibold text-gray-800">Job description</h2>
                    <hr class="w-full mt-2 h-1 mx-auto bg-ClearBlue border-0 rounded ">
                </div>
                <div class="flex flex-row gap-x-2.5 w-full justify-center">
                    <div class="flex-shrink-0 flex flex-col items-center w-[30%] gap-y-2">
                        <img src="/storage/{{ $listing->company->profile_photo }}" alt="{{ $listing->company->name }} logo" class="w-25 h-25 rounded object-contain">
                        <div>
                            @foreach($listing->tags as $tag)
                                <span class="inline-block tracking-wide text-xs font-medium title-font py-0.5 px-1.5 border border-blue-600 uppercase rounded-lg bg-ClearBlue text-gray-100">
                                    {{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="mr-3 text-md md:text-lg text-gray-800  w-[70%]">
                        {!! $listing->job_description !!}
                    </div>
                </div>

                @if (Auth::user()->role === 'employer')
                    <a href="" class="block my-4 text-center rounded-lg tracking-wide btn1 w-[50%] mx-auto cursor-not-allowed">A company can't apply</a>
                @else
                    <a href="{{ route('listings.apply', $listing->slug) }}" class="block my-4 text-center rounded-lg tracking-wide btn1 w-[50%] mx-auto">Apply Now</a>
                @endif
            </div>
        </div>
    </section>
</x-app-layout>