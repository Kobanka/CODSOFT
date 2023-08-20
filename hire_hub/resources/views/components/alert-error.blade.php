@if (session('error'))
    <div class="mt-2 rounded-md text-center bg-red-100 text-red-800 border border-red-200 px-4 py-2 ">
        {{ $slot }}
    </div>
@endif