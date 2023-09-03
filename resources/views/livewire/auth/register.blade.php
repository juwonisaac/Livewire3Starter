<div>
    <div class="min-h-screen">
        <x-card>
            <h2 class="text-3xl text-gray-800 font-bold dark:text-white text-center py-5">
                Inscription
            </h2>
            <x-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="store">

                <div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-4 text-left">
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" required />

                        <x-text-input id="name" wire:model="name" class="block mt-1 w-full" type="text"
                            name="name" :value="old('name')" required autofocus />

                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" required />

                        <x-text-input id="email" wire:model="email" class="block mt-1 w-full" type="email"
                            name="email" :value="old('email')" required />

                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Phone -->
                    <div>
                        <x-input-label for="phone" :value="__('Phone')" required />

                        <x-text-input id="phone" wire:model="phone" class="block mt-1 w-full" type="tel"
                            name="phone" :value="old('phone')" required />

                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <!-- Country -->
                    <div>
                        <x-input-label for="company_name" :value="__('Company name')" required />
                        <x-text-input id="company_name" class="block mt-1 w-full" wire:model="company_name"
                            type="text" name="company_name" />
                        <x-input-error :messages="$errors->get('company_name')" class="mt-2" />
                    </div>
                    <!-- Country -->
                    <div>
                        <x-input-label for="company_type" :value="__('Company Type')" required />
                        <select id="company_type" wire:model="company_type" class="block mt-1 w-full">
                            <option value=""> Secteur d'activité </option>
                            <option value="production">production</option>
                            <option value="agricole">
                                Agricole
                            </option>
                            <option value="transformation-alimentaire">
                                Transformation alimentaire
                            </option>
                            <option value="industrie-de-boissons">
                                Industrie de boissons
                            </option>
                            <option value="confiserie">
                                Confiserie
                            </option>
                            <option value="Aliments-surgelés">
                                Aliments surgelés
                            </option>
                            <option value="secteur-laitier">
                                Secteur laitier
                            </option>
                            <option value="Produits-de-la-mer">
                                Produits de la mer
                            </option>
                            <option value="Transformation-de-la-viande">
                                Transformation de la viande
                            </option>
                            <option value="Autre">
                                Autre
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('company_type')" class="mt-2" />

                    </div>
                    <!-- Country -->
                    <div>
                        <x-input-label for="company_size" :value="__('Company Size')" required />
                        <select id="company_size" wire:model="company_size" class="block mt-1 w-full">
                            <option value=""> Taille de l'entreprise </option>
                            <option value="petite">Petite</option>

                            <option value="moyenne">
                                Moyenne
                            </option>

                            <option value="grande">
                                Grande
                            </option>
                        </select>
                        <x-input-error :messages="$errors->get('company_size')" class="mt-2" />
                    </div>
                    <!-- Country -->
                    <div>
                        <x-input-label for="country" :value="__('Country')" required />
                        <x-text-input id="country" class="block mt-1 w-full" wire:model="country" type="text"
                            name="country" />
                        <x-input-error :messages="$errors->get('country')" class="mt-2" />
                    </div>

                    <!-- City -->
                    <div>
                        <x-input-label for="city" :value="__('City')" required />
                        <x-text-input id="city" class="block mt-1 w-full" wire:model="city" type="text"
                            name="city" required />
                        <x-input-error :messages="$errors->get('city')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div>
                        <x-input-label for="password" :value="__('Password')" required />

                        <x-text-input id="password" wire:model="password" class="block mt-1 w-full" type="password"
                            name="password" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" required />

                        <x-text-input id="password_confirmation" wire:model="passwordConfirmation"
                            class="block mt-1 w-full" type="password" name="password_confirmation" required />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>
                </div>

                <div class="flex px-4 items-center justify-between mt-4">
                    <a href="/login" wire:navigate
                        class="underline text-sm text-gray-600 hover:text-gray-900 dark:text-gray-100 dark:hover:text-gray-800">
                        {{ __('Already registered?') }}
                    </a>

                    <x-primary-button type="submit">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>
        </x-card>
    </div>
</div>
