<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;

Should: #[Layout('components.layouts.app')]class Dashboard extends Component
{
    public function render(): View
    {
        return view('livewire.admin.dashboard');
    }
}
