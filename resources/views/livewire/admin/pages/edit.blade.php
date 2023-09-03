<div>
    <section class="w-full py-10 px-6">
        <h1 class="block text-2xl font-bold mb-2">Modification de la page</h1>
        <div class="flex items-center mb-4">

            <a href="/" wire:navigate class="text-sm font-medium text-gray-500 hover:text-gray-700">
                Tableau de board
            </a>
            <svg class="inline-block w-3 h-3 mx-3 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 320 512">
                <path
                    d="M300.5 233.5L84.7 17.7c-4.7-4.7-12.3-4.7-17 0L17.7 67.7c-4.7 4.7-4.7 12.3 0 17l200.8 200.8L17.7 486.7c-4.7 4.7-4.7 12.3 0 17l49.9 49.9c4.7 4.7 12.3 4.7 17 0l216.8-216.8c4.7-4.7 4.7-12.3 0-17z">
                </path>
            </svg>
            <a href="/admin/pages" wire:navigate class="text-sm font-medium text-gray-500 hover:text-gray-700">
                {{ __('Pages') }}
            </a>
            <svg class="inline-block w-3 h-3 mx-3 text-gray-500 fill-current" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 320 512">
                <path
                    d="M300.5 233.5L84.7 17.7c-4.7-4.7-12.3-4.7-17 0L17.7 67.7c-4.7 4.7-4.7 12.3 0 17l200.8 200.8L17.7 486.7c-4.7 4.7-4.7 12.3 0 17l49.9 49.9c4.7 4.7 12.3 4.7 17 0l216.8-216.8c4.7-4.7 4.7-12.3 0-17z">
                </path>
            </svg>
            <p class="inline-block text-sm font-medium text-gray-500 hover:text-gray-700">
                {{ __('Update') }} {{ $form->title }}
            </p>
        </div>
        <!-- Validation Errors -->
        <x-validation-errors class="mb-4" :errors="$errors" />
        <div class="flex flex-wrap">
            @if (session()->has('message'))
                <div class="flex justify-between w-full px-4 py-2 mb-4 text-white bg-green-500 rounded-md">
                    <p>{{ session('message') }}</p>
                    <a href="/admin/page/create" wire:navigate class="text-sm font-bold text-white">Create
                        New Page</A>
                </div>
            @endif
            <div class="w-3/4 bg-white rounded-lg py-4 px-4">
                <div class="flex items-center justify-between mb-4">
                    <input type="text" class="w-full px-2 py-1 border border-gray-300 rounded-md"
                        wire:model="form.title" placeholder="{{ __('Page title') }}">
                    <x-input-error :messages="$errors->get('title')" for="" class="mt-2" />
                </div>

                <div class="flex w-full p-10 mx-auto mt-1 border rounded-md shadow-sm">
                    <livewire:editor-js editor-id="myEditor" :value="$form->content" :read-only="false"
                        placeholder="Fill in the content here..." lazy />
                    <x-input-error :messages="$errors->get('content')" for="" class="mt-2" />
                </div>

                <div class="flex w-full mt-1 border rounded-md shadow-sm">
                    <x-accordion title="Ajouteez une liste de carte" id="addCardContent">
                        <div class="flex justify-center w-full">
                            <button type="button" wire:click="addCardContent"
                                class="px-10 text-white mb-4 py-2 bg-blue-500 hover:bg-blue-700 font-bold text=center">
                                Ajouteez une liste de carte
                            </button>
                        </div>
                        <div class="flex flex-col space-y-2 py-4">
                            @isset($form->cardContent)
                                @foreach ($form->cardContent as $parentIndex => $item)
                                    <div class="border p-2" wire:key="cardItems-{{ $parentIndex }}"
                                        wire:key="cardItems-{{ $parentIndex }}">
                                        <label for="cardTitle{{ $parentIndex }}" class="block font-medium mb-2">
                                            Titre de section:</label>
                                        <input type="text" id="cardTitle{{ $parentIndex }}"
                                            wire:model="form.cardContent.{{ $parentIndex }}.title"
                                            class="w-full border-gray-300 my-2 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                        @foreach ($item['data'] as $nestedIndex => $nestedItem)
                                            <div x-data="{ isOpen: true }" x-init="isOpen = false"
                                                x-transition:enter="transition ease-out duration-100"
                                                x-transition:enter-start="opacity-0 transform scale-95"
                                                x-transition:enter-end="opacity-100 transform scale-100"
                                                x-transition:leave="transition ease-in duration-200"
                                                x-transition:leave-start="opacity-100 transform scale-100"
                                                x-transition:leave-end="opacity-0 transform scale-95"
                                                class="border border-gray-300 rounded-md shadow-sm mb-2 p-2"
                                                wire:key="menuItems-{{ $nestedIndex }}" :data-id="{{ $nestedIndex }}">
                                                <div class="w-full flex justify-between">
                                                    <button @click="isOpen = !isOpen" class="w-full flex justify-start">
                                                        <i class="fa fa-caret-down"
                                                            :class="{ 'fa-caret-up': isOpen, 'fa-caret-down': !isOpen }"
                                                            aria-hidden="true">
                                                        </i>
                                                    </button>
                                                    <button type="button" class="text-red-500 px-2"
                                                        wire:click="removeNestedCardContent({{ $parentIndex }}, {{ $nestedIndex }})"
                                                        danger><i class="fas fa-trash-alt"></i></button>
                                                </div>
                                                <div x-show="isOpen" class="flex flex-col">
                                                    <div class="my-2">
                                                        <label for="nestedCardTitle{{ $nestedIndex }}"
                                                            class="block font-medium mb-2">Titre:</label>
                                                        <input type="text" id="nestedCardTitle{{ $nestedIndex }}"
                                                            wire:model="form.cardContent.{{ $parentIndex }}.data.{{ $nestedIndex }}.cardTitle"
                                                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="nestedCardIcon{{ $nestedIndex }}"
                                                            class="block font-medium mb-2">Icon:</label>
                                                        <div class="flex" x-data="{ icon: '' }">
                                                            <div
                                                                class="flex-none bg-gray-100 w-10 px-6 py-1 rounded-md text-gray-600 focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                                <i x-bind:class="icon"></i>
                                                            </div>
                                                            <div class="flex-1">
                                                                <input type="text"
                                                                    id="nestedCardIcon{{ $nestedIndex }}"
                                                                    wire:model="form.cardContent.{{ $parentIndex }}.data.{{ $nestedIndex }}.cardIcon"
                                                                    x-on:input="icon = $el.value"
                                                                    class="w-full bg-gray-100 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                                                    placeholder="Enter the icon name here">
                                                            </div>
                                                        </div>

                                                        <small class="mt-2">Get icons from <a
                                                                href="https://fontawesome.com/icons"
                                                                class="text-blue-500 underline" target="_blank">Font
                                                                Awesome</a></small>
                                                    </div>
                                                    <div class="mb-2">
                                                        <label for="nestedCardText{{ $nestedIndex }}"
                                                            class="block font-medium mb-2">Contenue:</label>
                                                        <textarea id="nestedCardText{{ $nestedIndex }}"
                                                            wire:model="form.cardContent.{{ $parentIndex }}.data.{{ $nestedIndex }}.cardText"
                                                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="flex justify-center text-center gap-4 w-full py-4">
                                            <button
                                                class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                                                type="button" wire:click="addNestedCardContent({{ $parentIndex }})">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                            <button
                                                class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                                                type="button" wire:click="removeCardContent({{ $parentIndex }})"><i
                                                    class="fas fa-trash-alt"></i></button>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="flex justify-center text-center w-full py-4">
                                    <button type="button" wire:click="saveCardContent"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        {{ __('Enregistrez') }}</button>
                                </div>
                            @endisset
                        </div>
                    </x-accordion>
                </div>
                <div class="flex w-full mt-1 border rounded-md shadow-sm">
                    <x-accordion title="Ajoute du contenue avant l'inscription" id="before_registration">
                        <x-trix name="before_registration" wire:model="form.before_registration" class="mt-1" />
                    </x-accordion>
                </div>
                <div class="flex w-full mt-1 border rounded-md shadow-sm">
                    <x-accordion title="Ajoute du contenue apres l'inscription" id="after_registration">
                        <x-trix name="after_registration" wire:model="form.after_registration" class="mt-1" />
                    </x-accordion>
                </div>
            </div>

            <div class="w-1/4 py-4 px-4">
                <div class="mt-4">
                    <x-label for="image" :value="__('Image')" />
                    <x-media-upload title="{{ __('Image') }}" name="image" wire:model="form.image"
                        :file="$form->image" single types="PNG / JPEG / WEBP" fileTypes="image/*" />
                </div>
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Page Link</label>
                    <a href="{{ route('page.show', $form->slug) }}" target="__blank"
                        class="block w-full px-2 py-1 border border-gray-300 rounded-md">{{ route('page.show', $form->slug) }}</a>
                    </a>
                </div>


                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Type</label>
                    <select wire:model="form.type" class="block w-full px-2 py-1 border border-gray-300 rounded-md">
                        <option value=""></option>
                        @foreach (App\Enums\PageType::options() as $option)
                            <option value="{{ $option->getValue() }}"
                                @if ($form->type === $option->getValue()) selected @endif>
                                {{ $option->getName() }}
                            </option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->get('type')" for="" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox" wire:model="form.status">
                        <span class="ml-2">Publish</span>
                    </label>
                </div>
                <div class="mt-4">
                    <button wire:click="update"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600">Save</button>
                </div>
                <div wire:loading wire:target="update">
                    Modification en progress ...
                </div>
                <div class="mt-4">
                    <p class="text-sm font-medium text-gray-500">Last updated:
                        {{ $form->updated_at->diffForHumans() }}
                    </p>
                    <p class="text-sm font-medium text-gray-500">Created at: {{ $form->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
