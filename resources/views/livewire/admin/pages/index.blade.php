<div>
    <section class="w-full pt-10 pb-6 px-6">
        <div class="flex justify-between items-center w-full">
            <h1 class="text-2xl font-bold">Listes Pages</h1>
            <a href="/admin/page/create" wire:navigate
                class=" px-4 py-2 bg-green-500 rounded-md text-sm font-bold text-white">
                Créer une page
            </a>
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
        <div class="w-full bg-white rounded-lg p-4">
            <table class="w-full table-auto px-4 border-collapse py-4 border shadow" wire:loading.class="opacity-50">
                <thead class="bg-gray-50 dark:bg-gray-700">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Titre
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Status
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Type
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pages as $page)
                        <tr>
                            <td class=" px-4 py-2">
                                <a href="{{ route('page.show', $page->slug) }}" target="__blank"
                                    class="text-blue-500 hover:underline">
                                    {{ $page->title }}
                                </a>
                            </td>
                            <td class="px-4 py-2">{{ $page->status ? 'Published' : 'Draft' }}</td>
                            <td class="px-4 py-2">{{ $page->type }}</td>
                            <td class="px-4 py-2">
                                <div class="flex justify-center space-x-2">
                                    <a href="/admin/page/{{ $page->slug }}/edit" wire:navigate
                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <button wire:click="delete({{ $page->id }})" type="button"
                                        wire:loading.class="opacity-50" wire:loading.attr="disabled"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pt-3">
                {{ $pages->links() }}
            </div>
        </div>
    </section>
</div>
