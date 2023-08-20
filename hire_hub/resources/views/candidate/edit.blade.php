<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Dashboard') }}
      </h2>
  </x-slot>

  <section class="pt-3">
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
        <p class="text-ClearBlue font-bold text-lg mt-2 inline-block underline">{{ $candidate->first_name }} {{ $candidate->last_name }}</p>
      </div>

      <h2 class="font-semibold text-xl text-ClearBlue mt-3 leading-tight">
        Edit Profile
      </h2>

      <form action="{{ route('candidate.update', $candidate) }}" method="post" class="w-full p-8 md:text-lg" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mx-auto w-full p-8 md:text-lg">
          <div class="flex border-2 border-gray-500 rounded flex-col gap-y-4 py-12">
              {{-- Name --}}
              <div class="flex flex-wrap md:flex-nowrap">
                <div class="w-full px-3 md:w-1/2">
                  <div class="mb-5">
                      <label
                      for="fname"
                      class="block text-base font-medium "
                      >
                      First Name
                      </label>
                      <input 
                      value="{{ old('fname', $candidate->first_name) }}" 
                      type="text" 
                      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                      name="fname" id="fname"/>
                  </div>
                  @error('fname')
                      <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              
                <div class="w-full px-3 md:w-1/2">
                  <div class="mb-5">
                      <label
                      for="lname"
                      class="block text-base font-medium "
                      >
                      Last Name
                      </label>
                      <input 
                      value="{{ old('lname', $candidate->last_name) }}"
                      type="text" 
                      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                      name="lname" id="lname"/>
                  </div>
                  @error('lname')
                      <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              </div>
    
              {{-- Email and Birthday --}}
              <div class="flex flex-wrap md:flex-nowrap">
                <div class="w-full px-3 md:w-1/2">
                  <div class="mb-5">
                      <label
                      for="email"
                      class="block text-base font-medium "
                      >
                      Email
                      </label>
                      <input 
                      value="{{ old('email', $candidate->email) }}"
                      type="email" 
                      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                      name="email" id="email"/>
                  </div>
                  @error('email')
                      <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              
                <div class="w-full px-3 md:w-1/2">
                  <div class="mb-5">
                  <label
                      for="birthday"
                      class="block text-base font-medium "
                  >
                      Birthday
                  </label>
                  <input
                      type="date"
                      name="birthday"
                      value="{{ old('birthday', $candidate->birthday) }}"
                      id="birthday"
                      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md"
                  />
                </div>
              </div>
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
                      <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" name="country" id="country">
                          <option value="">--Select Country--</option>
                          @foreach ($countries as $country)
                              <option value="{{ $country->name }}" {{ old('country', $candidate->country) == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                          @endforeach
                      </select>
                  </div>
                </div>
              
                <div class="w-full px-3 md:w-1/2">
                    {{-- Enter City --}}
                    <div class="mb-5">
                        <label
                        for="city"
                        class="block text-base font-medium "
                        >
                        City/Town
                        </label>
                        <input 
                        type="text" 
                        value="{{ old('city', $candidate->city) }}"
                        class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                        name="city" id="city" />
                    </div>
                </div>
              </div>
    
              <div class="flex flex-wrap md:flex-nowrap">
                {{-- Select Gender --}}
                <div class="w-full px-3 md:w-1/2">
                  <div class="mb-5">
                      <label
                      for="gender"
                      class="block text-base font-medium "
                      >
                      Gender
                      </label>
                      <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" name="gender" id="gender">
                          <option value="">--Select Gender--</option>
                          <option value="Male" {{ old('gender', $candidate->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                          <option value="Female" {{ old('gender', $candidate->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                      </select>
                  </div>
                </div>
                {{-- Enter Phone Number --}}
                <div class="w-full px-3 md:w-1/2">
                  <div class="mb-5">
                      <label
                      for="phone"
                      class="block text-base font-medium "
                      >
                      Contact No
                      </label>
                      <input type="tel"
                      value="{{ old('phone', $candidate->phone) }}"
                      class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                      name="phone" id="phone">
                </div>
              </div>
        </div>
        {{-- About User --}}
        <div class="w-full px-3">
          <div class="mb-5">
            <label
            for="about"
            class="block text-base font-medium "
            >
            About Me
            </label>
            <textarea
            rows="10" 
            name="about" id="about"
            placeholder="Write something about yourself..."
            class="whitespace-pre-wrap w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
            >{{ old('about', $candidate->about_me) }}</textarea>
        </div>
        <div class="flex justiy-center items-center gap-y-4 flex-wrap md:flex-nowrap">
          <div class="w-full flex flex-col px-3 md:w-1/2">
            <label for="file" class="font-semibold text-ClearBlue">
              Upload Profile Photo
            </label>
            <input type="file" name="file" id="file" accept="image/*">
          </div>
    
          <div class="w-full px-3 md:w-1/2">
            <button type="submit" class="text-center rounded-lg tracking-wide btn1">Save</button>
          </div>
        </div>
      </form>
    </div>
  </section>    
</x-app-layout>
