<div>
    <section class="w-full pt-10 pb-6 px-6">
        <div class="flex justify-between items-center w-full">
            <h1 class="text-2xl font-bold">Listes Contacts</h1>
        </div>
        <div class="flex items-center justify-between gap-6 mb-2 pt-4 w-full">
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
                            {{ __('Name') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Phone') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Message') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <td class=" px-4 py-2">
                                #
                            </td>
                            <td class=" px-4 py-2">
                                {{ $contact->name }}
                            </td>
                            <td class=" px-4 py-2">
                                {{ $contact->phone_number }}
                            </td>
                            <td class=" px-4 py-2">
                                {{ $contact->message }}
                            </td>

                            <td class=" px-4 py-2">
                                <div class="flex justify-center space-x-2">
                                    <button type="button" wire:click="delete({{ $contact->id }})"
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
                    {{ $contacts->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
