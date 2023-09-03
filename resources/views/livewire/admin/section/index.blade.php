<div>
    <section class="w-full pt-10 pb-6 px-6">
        <div class="flex justify-between items-center w-full">
            <h1 class="text-2xl font-bold">Listes Sections</h1>
            <button wire:click="$dispatchTo('admin.section.create', 'createModal')" wire:loading.class="opacity-50"
                wire:loading.attr="disabled" class=" px-4 py-2 bg-green-500 rounded-md text-sm font-bold text-white">
                Créer une section
            </button>
        </div>
        <div class="flex items-center justify-between gap-6 py-4 w-full">
            <div class="inline-flex">
                <select wire:model.live="perPage" name="perPage"
                    class="p-3 leading-5 text-gray-500  mb-1 focus:shadow-outline-blue focus:border-blue-500 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 block w-32">
                    @foreach ($paginationOptions as $value)
                        <option value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="inline-flex w-full">
                <input type="text" wire:model.live="query"
                    class="p-3 leading-5 text-gray-500  mb-1 focus:shadow-outline-blue focus:border-blue-500 bg-gray-50 border border-gray-300 text-sm rounded-lg focus:ring-blue-500 block w-full"
                    placeholder="{{ __('Recherche') }}" />
            </div>
        </div>
        @if (session()->has('message'))
            <div class="flex justify-between w-full px-4 py-2 mb-4 text-white bg-green-500 rounded-md">
                <p>{{ session('message') }}</p>
                <button wire:click="$dispatchTo('admin.section.create', 'createModal')" type="button"
                    class="text-sm font-bold text-white">Créer une section
                </button>
            </div>
        @endif
        <div class="w-full bg-white rounded-lg p-4">
            <table class="w-full bg-white table-auto p-4 border-collapse border shadow" wire:loading.class="opacity-50">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            #
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Image') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Titre') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Type') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Page') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sections as $section)
                        <tr>
                            <td class=" px-4 py-2">
                                #
                            </td>
                            <td class=" px-4 py-2">
                                <img src="{{ asset('images/sections/' . $section->image) }}"
                                    alt="{{ $section->title }}" class="w-20 h-20 object-cover object-center">
                            </td>
                            <td class=" px-4 py-2">
                                {{ $section->title }}
                            </td>
                            <td class=" px-4 py-2">
                                {{ $section->type }}
                            </td>
                            <td class=" px-4 py-2">
                                {{ $section?->page?->title }}
                            </td>

                            <td class=" px-4 py-2">
                                <div class="flex justify-center space-x-2">
                                    <button
                                        wire:click="$dispatchTo('admin.section.edit', 'editModal', { id: {{ $section->id }} })"
                                        type="button" wire:loading.class="opacity-50" wire:loading.attr="disabled"
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" wire:click="delete({{ $section->id }})"
                                        wire:loading.class="opacity-50" wire:loading.attr="disabled"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center">
                                {{ __('No entries found.') }}
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="card-body">
                <div class="pt-3">
                    {{ $sections->links() }}
                </div>
            </div>
        </div>
    </section>

    <livewire:admin.section.edit :section="$section" lazy />

    <livewire:admin.section.create lazy />

</div>
