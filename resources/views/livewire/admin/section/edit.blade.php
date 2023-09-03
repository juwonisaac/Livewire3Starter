<div>
    <x-modal wire:model="editModal">
        <x-slot name="title">
            Modification de la section
        </x-slot>

        <x-slot name="content">
            <!-- Validation Errors -->
            <x-validation-errors class="mb-4" :errors="$errors" />

            <form wire:submit="update">
                <div class="flex flex-wrap space-y-2 px-2">
                    <div class="xl:w-1/2 md:w-full px-2">
                        <x-label for="title" :value="__('Titre')" />
                        <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                            wire:model="form.title" />
                        <x-input-error :messages="$errors->get('form.title')" for="form.title" class="mt-2" />
                    </div>

                    <div class="xl:w-1/2 md:w-full px-2">
                        <x-label for="subtitle" :value="__('Sous titre')" />
                        <x-input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle"
                            wire:model="form.subtitle" />
                        <x-input-error :messages="$errors->get('form.subtitle')" for="form.subtitle" class="mt-2" />
                    </div>

                    <div class="xl:w-1/2 md:w-full px-2">
                        <x-label for="page" :value="__('Page')" />
                        <select wire:model="form.page_id" id="page_id"
                            class="block w-full px-2 py-1 border border-gray-300 rounded-md">
                            <option value="">{{ __('Select Page') }}</option>
                            @foreach ($this->pages as $page)
                                <option value="{{ $page->id }}" @if ($form?->page_id == $page->id) selected @endif>
                                    {{ $page->title }}</option>
                            @endforeach
                            <x-input-error :messages="$errors->get('form.page_id')" for="form.page_id" class="mt-2" />
                        </select>
                    </div>
                    <div class="xl:w-1/2 md:w-full px-2">
                        <x-label for="type" :value="__('Type')" />
                        <select wire:model="form.type"
                            class="block w-full px-2 py-1 border border-gray-300 rounded-md">
                            <option value=""></option>
                            @foreach (App\Enums\PageType::options() as $option)
                                <option value="{{ $option->getValue() }}"
                                    @if ($form?->type === $option->getValue()) selected @endif>
                                    {{ $option->getName() }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="xl:w-1/2 md:w-full px-2">
                        <x-label for="bg_color" :value="__('Background Color')" />
                        <input id="bg_color" class="block mt-1 w-full" type="color" name="bg_color"
                            wire:model="form.bg_color" />
                        <x-input-error :messages="$errors->get('form.bg_color')" for="form.bg_color" class="mt-2" />
                    </div>
                    <div class="xl:w-1/2 md:w-full px-2">
                        <x-label for="label" :value="__('label')" />
                        <x-input id="label" class="block mt-1 w-full" type="text" name="label"
                            wire:model="form.label" />
                        <x-input-error :messages="$errors->get('form.label')" for="form.label" class="mt-2" />
                    </div>
                    <div class="xl:w-1/2 md:w-full px-2">
                        <x-label for="link" :value="__('Link')" />
                        <div class="flex">
                            <div class="flex-none bg-gray-100 px-2 py-1 rounded-md">
                                <span class="text-gray-600">
                                    {{ config('app.url') }}
                                </span>
                            </div>
                            <div class="flex-1">
                                <x-input id="link" class="block mt-1 w-full" type="text" name="link"
                                    wire:model="form.link" />
                            </div>
                        </div>
                        <small class="text-gray-500">Enter a link starting with "/home" to go to a page or "#home" for
                            an anchor link.</small>
                        <x-input-error :messages="$errors->get('link')" for="link" class="mt-2" />
                    </div>

                   
                    <div class="w-full py-2 px-3">
                        <x-label for="image" :value="__('Image')" />
                        <x-media-upload title="{{ __('Image') }}" name="image" wire:model="form.image" :file="$form->image"
                            single types="PNG / JPEG / WEBP" fileTypes="image/*" />
                    </div>
                    <div class="w-full px-2">
                        <x-label for="description" :value="__('Description')" />
                        <x-trix name="editDescription" wire:model="form.description" class="mt-1" />
                        <x-input-error :messages="$errors->get('description')" for="description" class="mt-2" />
                    </div>

                    <div class="w-full text-center px-3">
                        <button
                            class="w-full block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                            type="submit" wire:loading.class="opacity-50" wire:loading.attr="disabled">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </x-slot>
    </x-modal>
</div>
