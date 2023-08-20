@extends('layouts.dashboard')

@section('content')
<div class="h-full w-[92%] mt-14 mb-10 md:w-[80%] self-center">
        
    <!-- Profile Section -->
    <div class="flex flex-col justify-center items-center gap-y-3">
        <div class="flex flex-col items-center">
        <div class="icon-image">
            @if (isset($candidate->profile_photo))
            <img src="/storage/{{ $candidate->profile_photo }}" alt="{{ $candidate->first_name }} logo/profile" class="w-36 h-36 rounded-full object-cover" />
            @else
            <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
            <lord-icon
                src="https://cdn.lordicon.com/dxjqoygy.json"
                trigger="hover"
                colors="primary:#3080e8,secondary:#3080e8"
                class="w-32 h-32 rounded-full border-2 border-gray-200"
                >
            </lord-icon>
            @endif
        </div>
        <p class="whitespace-pre-wrap text-ClearBlue font-bold text-lg mt-2 inline-block underline">{{ $candidate->first_name }} {{ $candidate->last_name }}</p>
        </div>
    </div>

    <div class="px-4">
        <x-alert-success>
            {{ session('success') }}
        </x-alert-success>
    </div>

    {{-- Full inormation --}}
    <div class="p-3 md:p-12 mt-8">
        <div class="">
            <div class="grid md:grid-cols-2">
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">First Name :</div>
                <div class="px-4 py-2">{{ $candidate->first_name }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Last Name :</div>
                <div class="px-4 py-2">{{ $candidate->last_name }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Email :</div>
                <div class="px-4 py-2">
                    <a class="text-blue-800" href="mailto:{{ $candidate->email }}">{{ $candidate->email }}</a>
                </div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Phone Number :</div>
                <div class="px-4 py-2">{{ $candidate->phone }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Country :</div>
                <div class="px-4 py-2">{{ $candidate->country }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">City/Town :</div>
                <div class="px-4 py-2">{{ $candidate->city }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Gender :</div>
                <div class="px-4 py-2">{{ $candidate->gender }}</div>
            </div>
            <div class="grid grid-cols-2">
                <div class="px-4 py-2 font-semibold">Birthday :</div>
                <div class="px-4 py-2">{{ $candidate->birthday }}</div>
            </div>
            </div>
        </div>

        <div class="w-full px-3 mt-2">
            <div class="mb-5">
                <label
                for="about"
                class="block text-base font-medium "
                >
                About Me
                </label>
                <textarea
                rows="10" 
                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                name="about" id="about" readonly>{{ $candidate->about_me }}</textarea>
            </div>
        </div>
        
        <a href="{{ route('candidate.edit', $candidate) }}" class="inline-block mt-6 text-center rounded-lg tracking-wide btn1">Edit</a>
        
    </div>
  </div>
@endsection
