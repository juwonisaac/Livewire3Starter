<nav class="uppercase grid gap-y-3 py-2" x-data="{ isMobileDropdown: false }">
    <a href="/accueil"  wire:navigate class="px-3 flex items-center justify-center rounded-md h">
        <span class="ml-3 text-base font-semibold text-gray-900 dark:text-slate-400 hover:text-blue-600 hover:underline ">
            Accueil
        </span>
    </a>
    <a href="/a-propos"  wire:navigate class="px-3 flex items-center justify-center rounded-md h">
        <span class="ml-3 text-base font-semibold text-gray-900 dark:text-slate-400 hover:text-blue-600 hover:underline ">
            A propos
        </span>
    </a>
    
    <a href="/contact" wire:navigate class="px-3 flex items-center justify-center rounded-md h">
        <span class="ml-3 text-base font-semibold text-gray-900 dark:text-slate-400 hover:text-blue-600 hover:underline ">
            Contact
        </span>
    </a>
    <a href="/login" wire:navigate class="px-3 flex items-center justify-center rounded-md h">
        <span class="ml-3 text-base font-semibold text-gray-900 dark:text-slate-400 hover:text-blue-600 hover:underline ">
            Connexion
        </span>
    </a>
</nav>
