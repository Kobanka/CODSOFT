@if (session('success'))
    <div class="my-2 rounded-md text-center bg-green-100 text-green-800 border border-green-200 px-4 py-2 w-full">
        {{ $slot }}
    </div>
@endif