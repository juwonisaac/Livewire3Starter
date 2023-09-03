<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Attributes\Computed;
use Livewire\Component;

class FrontIndex extends Component
{
    #[Computed]
    public function sections()
    {
        return Section::active()->take(1)->get();
    }

    public function render()
    {
        return view('livewire.front-index');
    }
}
