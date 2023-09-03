<div x-data="{ mobileMenuOpen: false, open: false }" x-on:click.outside="open = false" class="relative drop-shadow-xl py-6 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="flex justify-between items-center border-gray-100 md:space-x-10">
            <div class="flex justify-start">
                <a href="/" title="" wire:navigate class="text-gray-100 dark:text-white">
                    Livewire3Starter
                </a>
            </div>
            {{-- <div class="flex items-center justify-center space-x-4 md:order-last">
                <span class="text-gray-100 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <label for="toggle"
                    class="flex items-center h-5 p-1 duration-300 ease-in-out bg-gray-300 rounded-full cursor-pointer w-9 dark:bg-gray-600">
                    <div
                        class="w-4 h-4 duration-300 ease-in-out transform bg-white rounded-full shadow-md toggle-dot dark:translate-x-3">
                    </div>
                </label>
                <span class="text-gray-100 dark:text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z" />
                    </svg>
                </span>
                <input id="toggle" type="checkbox" class="hidden" :value="darkMode"
                    @change="darkMode = !darkMode" />
            </div> --}}

            <div class="-mr-2 -my-2 md:hidden">
                <button @click="mobileMenuOpen = mobileMenuOpen ? false : true" type="button"
                    class="dark:bg-slate-900 dark:text-slate-400 p-2 inline-flex items-center justify-center text-white hover:text-blue-500"
                    aria-expanded="false">
                    <span class="sr-only">{{ __('Open menu') }}</span>
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': mobileMenuOpen, 'inline-flex': ! mobileMenuOpen }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! mobileMenuOpen, 'inline-flex': mobileMenuOpen }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <x-navigation.desktop />
        </div>
    </div>

    <div style="display: none" x-show="mobileMenuOpen" x-transition:enter="duration-200 ease-out"
        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="duration-100 ease-in" x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95" @click.away="mobileMenuOpen = false" type="button"
        class="absolute inset-x-0 p-2 w=full md:hidden">
        <div
            class="relative top-2 rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white dark:bg-slate-900 divide-y-2 divide-gray-50">
            <x-navigation.mobile />
        </div>
    </div>
</div>
