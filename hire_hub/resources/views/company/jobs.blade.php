@extends('layouts.dashboard2')

@section('content')
<section class="container mx-auto py-12 md:px-5 bg-slate-100">
    <div class="mb-12">
        <h2 class="text-2xl font-bold text-ClearBlue text-center md:text-3xl">Posted jobs ({{ $listings->count() }})</h2>
        <hr class="w-full mt-2 h-0.5 mx-auto bg-ClearBlue border-0 rounded ">
    </div>
    <div class="-my-6">
        @forelse($listings as $listing)
            <a
                href="{{ route('listings.show', $listing->slug) }}"
                class="py-3 px-4 flex flex-wrap md:justify-between md:py-6 md:px-8 md:flex-nowrap border rounded my-2 border-ClearBlue bg-white hover:bg-gray-200"
            >
                <div class="flex flex-row gap-x-8">
                    <div class="w-16 flex-shrink-0 flex">
                        <img src="/storage/{{ $listing->company->profile_photo }}" alt="{{ $listing->company->name }} logo" class="w-16 h-16 rounded object-cover">
                    </div>
                    <div class="mr-2 flex flex-col items-start justify-center">
                        <h2 class="text-xl font-bold text-ClearBlue title-font mb-1">{{ $listing->title }}</h2>
                        <p class="leading-relaxed text-gray-600">
                            {{ $listing->company->name }} &mdash; <span class="text-gray-600 font-semibold">{{ $listing->country }}</span>
                        </p>
                    </div>
                </div>
                
                <div class="flex md:flex-row flex-col gap-x-8 mt-4 md:mt-0">
                    <div class="md:flex-grow md:mr-8 flex items-center gap-x-2 justify-start">
                        @foreach($listing->tags as $tag)
                           <span class="inline-block md:tracking-wide text-xs font-medium title-font md:py-0.5 md:px-1.5 px-0.5 border border-blue-600 uppercase rounded-lg {{ $tag->slug == request()->get('tag') ? 'bg-ClearBlue text-white' : 'text-ClearBlue bg-gray-100' }}">
                               {{ $tag->name }}
                           </span>
                        @endforeach
                    </div>
                    <span class="md:flex-grow flex items-center text-gray-700 justify-end">
                        <span>{{ $listing->created_at->diffForHumans() }}</span>
                    </span>
                </div>
            </a>

        @empty
            <p class="text-xl text-center text-gray-700">You Have Not Posted A Job Yet !!!</p>
        @endforelse
    </div>
</section>
@endsection