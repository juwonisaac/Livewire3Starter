<div>
    <section>
        <p class="text-center">
            <x-validation-errors class="mb-4" :errors="$errors" />
            @if (session()->has('message'))
                <div class="flex justify-between w-full px-4 py-2 mb-4 text-white bg-green-500 rounded-md">
                    <p>{{ session('message') }}</p>>
                </div>
            @endif
        </p>
        <form wire:submit.prevent="submit">
            <div class="grid gap-2 sm:grid-cols-1 xl:grid-cols-2">
                <p>
                    <input type="text" wire:model="name" id="name" name="name"
                        placeholder="{{ __('Company name') }}" value="{{ old('name') }}" autocomplete="name"
                        class="@error('name') is-invalid @enderror w-full bg-zinc-100 bg-opacity-50 rounded border border-zinc-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-zinc-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <x-input-error :messages="$errors->get('name')" for="name" class="mt-2" />
                </p>
                <p>
                    <input type="email" wire:model="email" id="email" name="email"
                        placeholder="{{ __('Company Email') }}" value="{{ old('email') }}" autocomplete="email"
                        class="@error('email') is-invalid @enderror w-full bg-zinc-100 bg-opacity-50 rounded border border-zinc-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-zinc-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <x-input-error :messages="$errors->get('email')" for="email" class="mt-2" />
                </p>
                <p>
                    <input type="text" wire:model="phone_number" id="phone_number" name="phone_number"
                        placeholder="{{ __('Phone number') }}" value="{{ old('phone_number') }}" autocomplete="mobile"
                        class="@error('phone_number') is-invalid @enderror w-full bg-zinc-100 bg-opacity-50 rounded border border-zinc-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-zinc-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    <x-input-error :messages="$errors->get('phone_number')" for="phone_number" class="mt-2" />
                </p>

            </div>
            <p class="py-4">
                <textarea id="message" wire:model="message" name="message" placeholder="Message" value="{{ old('message') }}"
                    class="w-full h-56 bg-zinc-100 bg-opacity-50 rounded border border-zinc-300 focus:border-green-500 focus:bg-white focus:ring-2 focus:ring-green-200 text-base outline-none text-zinc-700 py-1 px-3 leading-6 transition-colors duration-200 ease-in-out"></textarea>
                <x-input-error :messages="$errors->get('message')" for="message" class="mt-2" />
            </p>
            <button
                class="md:text-sm sm:text-xs bg-gradient-to-r from-green-400 to-green-600 text-white hover:text-green-100 hover:from-green-500 hover:to-green-700 active:from-green-600 active:to-green-800 focus:ring-green-300 text-sm font-bold uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150">
                <span>{{ __('Send Message') }}</span>
            </button>
        </form>
    </section>
</div>
