<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Section;

use App\Livewire\Forms\SectionForm;
use App\Models\Page;
use App\Models\Section;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Admin\Section\Index;
class Edit extends Component
{
    use WithFileUploads;

    public SectionForm $form;

    public $editModal = false;

    #[Computed]
    public function pages()
    {
        return Page::select('id', 'title')->get();
    }

    #[On('editModal')]
    public function editModal($id)
    {
        $section = Section::where('id', $id)->first();

        $this->form->setPost($section);

        $this->editModal = true;
    }

    public function update()
    {
        $this->form->update();

        session()->flash('message', 'Section updated successfully.');

        $this->dispatch('refreshIndex')->to(Index::class);

        $this->editModal = false;
    }

    public function render(): View
    {
        return view('livewire.admin.section.edit');
    }
}
