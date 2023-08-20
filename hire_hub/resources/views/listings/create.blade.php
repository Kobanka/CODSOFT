<x-app-layout>
    {{-- Form to create a new Job or listing --}}
    <section class="text-ClearBlue flex justify-center items-center">
        <div class="mx-auto md:w-1/2 p-8 md:text-lg">
            @if($errors->any())
                <div class="mb-4 p-4 bg-red-200 text-red-800">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('listings.store') }}" method="POST" class="flex border-2 border-gray-500 rounded flex-col gap-y-4 py-12 px-4 bg-gray-100">
                @csrf
                {{-- Job Title --}}
                <h2 class="text-2xl md:text-3xl font-semibold text-center">Post a new Job</h2>
                <div class="mb-5 px-3">
                    <label
                    for="title"
                    class="block text-base font-medium"
                    >
                    Job Title
                    </label>
                    <input
                    type="text"
                    name="title"
                    value=" {{ old('title') }} "
                    id="title"
                    placeholder="Title of the Job......"
                    class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md"
                    />
                </div>
                {{-- Select Country --}}
                <div class="flex flex-wrap md:flex-nowrap">
                <div class="w-full px-3 md:w-1/2">
                    <div class="mb-5">
                        <label
                        for="country"
                        class="block text-base font-medium "
                        >
                        Country
                        </label>
                        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                        name="country" id="country">
                            <option value="">--Select Country--</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->name }}" {{ old('country') == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="w-full px-3 md:w-1/2">
                    {{-- Select Category --}}
                    <div class="mb-5">
                        <label
                        for="category"
                        class="block text-base font-medium "
                        >
                        Category
                        </label>
                        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                        name="category" id="category">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}" {{ old('category') == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                </div>

                <div class="flex flex-wrap md:flex-nowrap">
                    {{-- Select Type --}}
                    <div class="w-full px-3 md:w-1/2">
                    <div class="mb-5">
                        <label
                        for="type"
                        class="block text-base font-medium "
                        >
                        Type
                        </label>
                        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                        name="type" id="type">
                            <option value="">--Select Type--</option>
                            <option value="full time" {{ old('type') == 'full time' ? 'selected' : '' }}>Full Time</option>
                            <option value="part time" {{ old('type') == 'part time' ? 'selected' : '' }}>Part Time</option>
                            <option value="remote" {{ old('type') == 'remote' ? 'selected' : '' }}>Remote</option>
                            <option value="internship" {{ old('type') == 'internship' ? 'selected' : '' }}>Internship</option>
                            <option value="remote full time" {{ old('type') == 'remote full time' ? 'selected' : '' }}>Remote Full Time</option>
                            <option value="remote part time" {{ old('type') == 'remote part time' ? 'selected' : '' }}>Remote Part Time</option>
                        </select>
                    </div>
                    </div>
                    {{-- Select Experience --}}
                    <div class="w-full px-3 md:w-1/2">
                    <div class="mb-5">
                        <label
                        for="experience"
                        class="block text-base font-medium "
                        >
                        Experience
                        </label>
                        <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                        name="experience" id="experience">
                            <option value="">--Select Experience--</option>
                            <option value="entry level" {{ old('experience') == 'entry level' ? 'selected' : '' }}>Entry Level</option>
                            <option value="mid level" {{ old('experience') == 'mid level' ? 'selected' : '' }}>Mid Level</option>
                            <option value="senior level" {{ old('experience') == 'senior level' ? 'selected' : '' }}>Senior Level</option>
                            <option value="executive level" {{ old('experience') == 'executive level' ? 'selected' : '' }}>Executive Level</option>
                        </select>
                    </div>
                    </div>
                </div>

                {{-- Closing Date and Tags--}}
                
                <div class="flex flex-wrap md:flex-nowrap">
                    <div class="w-full px-3 md:w-1/2">
                        <div class="mb-5">
                        <label
                            for="tag"
                            class="block text-base font-medium "
                        >
                            Tags (separate by comma)
                        </label>
                        <input
                            type="text"
                            name="tag"
                            value=" {{ old('tag') }} "
                            id="tag"
                            placeholder="PHP, JavaScript, ........"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                        </div>
                    </div>

                    <div class="w-full px-3 md:w-1/2">
                        <div class="mb-5">
                        <label
                            for="cdate"
                            class="block text-base font-medium "
                        >
                            Closing Date
                        </label>
                        <input
                            type="date"
                            name="cdate"
                            value=" {{ old('cdate') }} "
                            id="cdate"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                        </div>
                    </div>
                </div>
        
                <div class="mb-5">
                    <div class="mb-4 mx-2">
                        <label
                        for="content"
                        class="block text-base font-medium "
                    >
                        Job Description
                    </label>
                        <textarea
                            id="content"
                            rows="8"
                            placeholder="Your Job Description Here......"
                            class="whitespace-pre-wrap rounded-md shadow-sm border border-[#e0e0e0] bg-white py-3 px-6 outline-none focus:border-[#6A64F1] focus:shadow-md block mt-1 w-full text-gray-800 font-semibold"
                            name="content"
                        >{{ old('content') }}</textarea>
                    </div>
                </div>
        
                <button type="submit" class="block text-center rounded-lg tracking-wide btn1 w-[50%] mx-auto">Post Job</button>
            </form>
        </div>
    </section>
</x-app-layout>