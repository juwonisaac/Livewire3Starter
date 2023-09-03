<div>

    <div x-data="{ activeTab: 'list' }" class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
        <ul class="flex mb-4">
            <li class="mr-1">
                <button @click="activeTab = 'list'" :class="{ 'bg-blue-500 text-white': activeTab === 'list' }"
                    class="px-4 py-2 rounded-l-md">
                    List utilisateurs
                </button>
            </li>
            <li class="mr-1" x-show="activeTab === 'show'">
                <div :class="{ 'bg-blue-500 text-white': activeTab === 'show' }">
                    <button @click="activeTab = 'show'" class="relative px-4 py-2">
                        Affichage
                    </button>
                </div>
            </li>
        </ul>


        <div x-show="activeTab === 'list'" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-2"
            x-transition:enter-end="opacity-100 transform translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-x-0"
            x-transition:leave-end="opacity-0 transform translate-x-2">
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
                <table class="w-full bg-white table-auto p-4 border-collapse border shadow">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Nom
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Email
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Phone</th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->name }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user->email }}</td>
                            
                                <td class="px-6 py-4 whitespace-nowrap">{{ $user?->phone }}</td>

                             
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <button type="button" wire:click="delete({{ $user->id }})"
                                        wire:loading.class="opacity-50" wire:loading.attr="disabled"
                                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-body">
                    <div class="pt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>

       
    </div>
</div>
