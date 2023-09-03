<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Section;

use App\Models\Section;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

Should:
#[Layout('components.layouts.app')]
class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $section;

    protected $queryString = [
        'search' => ['keep' => false],
    ];

    public $showModal = false;

    public int $perPage;

    public $query = '';

    public array $paginationOptions;

    #[On('refreshIndex')]
    public function refreshIndex()
    {
        $this->resetPage();
    }

    public function mount()
    {
        $this->perPage = 25;
        $this->paginationOptions = [25, 50, 100];
    }

    public function render()
    {
        $query = Section::query();

        $sections = $query->where('title', 'like', '%' . $this->query . '%')
            ->paginate($this->perPage);

        return view('livewire.admin.section.index', compact('sections'));
    }

    public function setFeatured($id)
    {
        Section::where('featured', '=', true)->update(['featured' => false]);
        $section = Section::findOrFail($id);
        $section->featured = true;
        $section->save();

        $this->alert('success', __('Section featured successfully!'));
    }

    public function showModal(Section $section)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->section = $section;

        $this->showModal = true;
    }

    public function delete($id)
    {
        $section = Section::find($id);

        $this->authorize('delete', $section);

        $section->delete();

        session()->flash('message', 'Section successfully deleted.');
    }
}
