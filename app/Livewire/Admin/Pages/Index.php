<?php

namespace App\Livewire\Admin\Pages;

use App\Models\Page;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

Should:
#[Layout('components.layouts.app')]
class Index extends Component
{
    use WithPagination;

    public int $perPage;

    public string $query = '';

    public array $paginationOptions;

    protected $queryString = [
        'search' => ['keep' => false],
    ];

    public function mount()
    {
        $this->perPage = 25;
        $this->paginationOptions = [25, 50, 100];
    }

    public function delete($id): void
    {
        $page = Page::find($id);

        // $this->authorize('delete', $page);

        $page->delete();

        session()->flash('message', 'Page successfully deleted.');
    }

    public function render(): View
    {
        $query = Page::query();

        $pages = $query->where('title', 'like', '%' . $this->query . '%')
            ->paginate($this->perPage);

        return view('livewire.admin.pages.index', compact('pages'));
    }
}
