<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Section;

use App\Livewire\Forms\SectionForm;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Section\Index;

class Create extends Component
{
    use WithFileUploads;

    public $createModal = false;

    public SectionForm $form;

    #[Computed]
    public function pages()
    {
        return Page::select('id', 'title')->get();
    }

    public function render(): View|Factory
    {
        return view('livewire.admin.section.create');
    }

    #[On('createModal')]
    public function createModal()
    {
        $this->createModal = true;
    }

    public function create()
    {
        
        Section::create(
            $this->form->all()
        );

        session()->flash('message', 'Section creer avec succes.');

        $this->dispatch('refreshIndex')->to(Index::class);

        $this->createModal = false;

    }
}
