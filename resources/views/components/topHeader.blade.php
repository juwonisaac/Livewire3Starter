<div
    class="bg-blue-950 dark:from-blue-800 dar:via-indigo-800 dark:to-indigo-900 drop-shadow-md">
    <div class="flex flex-wrap justify-end pr-4 items-center text-center py-2 gap-4">
        @auth
            @role('admin')
                <a href="/admin/dashboard" wire:navigate 
                    class="text-sm font-semibold text-white hover:text-gray-400 dark:text-white dark:hover:text-gray-400 uppercase">
                    Tableau de board
                </a>
            @endrole
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    class="text-sm font-semibold text-white hover:text-gray-400 dark:text-white dark:hover:text-gray-40 uppercase "
                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    Deconnexion
                </button>
            </form>
        @else
            @if (Route::has('login'))
                <a href="/login"
                    wire:navigate
                    class="text-sm font-semibold text-white hover:text-gray-400 dark:text-white dark:hover:text-gray-400 uppercase">
                    Connexion
                </a>
            @endif

            @if (Route::has('register'))
                <a href="/register"
                    wire:navigate
                    class="ml-4 text-sm font-semibold text-white hover:text-gray-400 dark:text-white dark:hover:text-gray-400 uppercase">
                    Inscription
                </a>
            @endif
        @endauth
    </div>
</div>
