<x-app-layout>
    <section class="py-24 bg-gray-100 px-8 md:px-20">
        <div class="flex flex-wrap">
          <div class="mb-10 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12 md:px-3 lg:px-6">
            <h2 class="mb-6 text-2xl md:text-3xl font-bold text-ClearBlue">Contact us</h2>
            <p class="mb-6 text-neutral-700">
              Hire Hub: Connecting job seekers with their ideal positions and helping companies find the perfect candidates. Our platform streamlines the job search process for candidates by offering user-friendly search tools, while also providing companies with a dynamic space to post job openings and connect with motivated talent. 
              Join us to simplify the journey to your next opportunity or the perfect team member. Discover, connect, and thrive with Hire Hub.
            </p>
            <p class="mb-2 text-ClearBlue">
              Mohammédia, 94126, Morocco
            </p>
            <p class="mb-2 text-ClearBlue">
              +212 0632437481
            </p>
            <p class="mb-2 text-ClearBlue">
              anicetkobanka@gmail.com
            </p>
          </div>
          <div class="mb-12 w-full shrink-0 grow-0 basis-auto md:mb-0 md:w-6/12 md:px-3 lg:px-6">
              <x-alert-success>
                {{ session('success') }}
              </x-alert-success>
              <form method="POST" action="{{ route('contact.send') }}">
                  @csrf
      
                  <!-- Name -->
                  <div>
                      <x-input-label for="name" :value="__('Full Name')" />
                      <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                      <x-input-error :messages="$errors->get('name')" class="mt-2" />
                  </div>
      
                  <!-- Email Address -->
                  <div class="mt-4">
                      <x-input-label for="email" :value="__('Email')" />
                      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                      <x-input-error :messages="$errors->get('email')" class="mt-2" />
                  </div>
      
                  <!-- Message -->
                  <div class="mt-4">
                      <x-input-label for="text" :value="__('Message')" />
      
                      <x-textarea 
                          name="text" 
                          :value="old('text')"
                          field="text" 
                          rows="10" 
                          class="w-full mt-6 whitespace-pre-wrap" 
                          placeholder="Type your message here....">
                      </x-textarea>
                  </div>
      
                  
      
                  <div class="flex items-center justify-end mt-4">
                      <button type="submit" class="text-center rounded-lg tracking-wide btn1">Send</button>
                  </div>
              </form>
          </div>
        </div>
    </section>
</x-app-layout>