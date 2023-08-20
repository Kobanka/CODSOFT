<x-app-layout>
    <section class="pt-3">
        <!-- Profile Section -->
        <div class="flex flex-col justify-center items-center px-2 md:px-8 gap-y-3">
            <div class="flex flex-col items-center">
                <div class="icon-image">
                    @if (isset($company->profile_photo))
                      <img src="/storage/{{ $company->profile_photo }}" alt="{{ $company->name }} logo/profile" class="w-36 h-36 rounded-full object-cover" />
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
                <p class="text-ClearBlue font-bold text-lg mt-2 inline-block underline"> {{ $company->name }} </p>
            </div>
    
            <h2 class="font-semibold text-xl text-ClearBlue mt-3 leading-tight">
                Edit Profile
            </h2>
    
            <form action="{{ route('company.update', $company) }}" method="post" class="w-full border-2 border-gray-500 rounded p-8 md:text-lg" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="flex flex-col gap-y-4 pt-12">
                    {{-- Name --}}
                    <div class="flex flex-wrap md:flex-nowrap">
                        <div class="w-full px-3 md:w-1/2">
                            <div class="mb-5">
                                <label
                                for="cname"
                                class="block text-base font-medium "
                                >
                                Company Name
                                </label>
                                <input 
                                value="{{ old('cname', $company->name) }}"
                                type="text" 
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                                name="cname" id="cname"/>
                            </div>
                            @error('cname')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="w-full px-3 md:w-1/2">
                            <div class="mb-5">
                                <label
                                for="cdate"
                                class="block text-base font-medium "
                                >
                                Established in
                                </label>
                                <input 
                                type="date" 
                                value="{{ old('cdate', $company->established) }}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                                name="cdate" id="cdate"/>
                            </div>
                            @error('cdate')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    {{-- Email and Phone --}}
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
                            value="{{ old('email', $company->email) }}"
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
                                    for="phone"
                                    class="block text-base font-medium "
                                >
                                    Phone
                                </label>
                                <input
                                    type="tel"
                                    name="phone"
                                    value="{{ old('phone', $company->phone) }}"
                                    id="phone"
                                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md"
                                />
                            </div>
                        </div>
                    </div>
            
                    {{-- Category --}}
                    <div class="flex flex-wrap md:flex-nowrap">
                        <div class="w-full px-3 md:w-1/2">
                            <div class="mb-5">
                                <label
                                for="category"
                                class="block text-base font-medium "
                                >
                                Category
                                </label>
                                <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" name="category" id="category">
                                    <option value="">--Select Category--</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}" {{ old('category', $company->category) == $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="w-full px-3 md:w-1/2">
                            <div class="mb-5">
                                <label
                                for="people"
                                class="block text-base font-medium "
                                >
                                People
                                </label>
                                <select class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" name="people" id="people">
                                    <option value="">--Select Range--</option>
                                    <option value="1-10" {{ old('people', $company->people) == '1-10' ? 'selected' : '' }}>1-10</option>
                                    <option value="10-100" {{ old('people', $company->people) == '10-100' ? 'selected' : '' }}>10-100</option>
                                    <option value="100-500" {{ old('people', $company->people) == '100-500' ? 'selected' : '' }}>100-500</option>
                                    <option value="500-1000" {{ old('people', $company->people) == '500-1000' ? 'selected' : '' }}>500-1000</option>
                                </select>
                            </div>
                            @error('people')
                                <span class="error">{{ $message }}</span>
                            @enderror
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
                                        <option value="{{ $country->name }}" {{ old('country', $company->country) == $country->name ? 'selected' : '' }}>{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('country')
                                <span class="error">{{ $message }}</span>
                            @enderror
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
                                value="{{ old('city', $company->city) }}"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                                name="city" id="city" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- About Company --}}
                <div class="w-full px-3">
                    <div class="mb-5">
                      <label
                      for="text"
                      class="block text-base font-medium "
                      >
                      About Company
                      </label>
                      <textarea
                      field="about" 
                      rows="10" 
                      placeholder="Write about your Company........"
                      class="whitespace-pre-wrap w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-3 text-base font-medium text-gray-800 font-semibold outline-none focus:border-[#6A64F1] focus:shadow-md" 
                      name="about" id="about">{{ old('about', $company->about_comp) }}</textarea>
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
    
  
  
  
      {{-- <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900">
                      {{ __("You're logged in!") }}
                  </div>
  
                  <x-alert-success>
                      {{ session('success') }}
                  </x-alert-success>
  
                  <div>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi quaerat, ullam tenetur adipisci obcaecati suscipit rerum sequi odit neque reprehenderit quasi, vitae perferendis? Laboriosam asperiores consequuntur quisquam cupiditate soluta, voluptate in sequi culpa. Porro distinctio dolorum natus, nisi ad atque voluptate sint accusantium consectetur dolorem, repudiandae ea. Qui iure quod quam deserunt quaerat, sequi pariatur magnam recusandae accusamus nulla a impedit illo ad alias voluptatum distinctio nam molestiae assumenda tempora blanditiis? Perferendis earum omnis illum porro, iste aliquam quidem. Vero iste libero mollitia? Magnam earum sit tempora dignissimos expedita ea, ipsum, voluptas suscipit corrupti veniam alias optio, exercitationem eligendi? Aperiam?</div>
              </div>
          </div>
      </div> --}}
  </x-app-layout>
  