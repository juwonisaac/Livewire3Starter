<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Contact;

use App\Models\Contact;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

Should: #[Layout('components.layouts.app')]class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    public $contact;

    protected $queryString = [
        'search' => ['keep' => false],
    ];

    public $showModal = false;

    public int $perPage;

    public $query = '';

    public array $paginationOptions;

   
    public function mount()
    {
        $this->perPage = 25;
        $this->paginationOptions = [25, 50, 100];
    }

    public function render()
    {
        $query = Contact::query();

        $contacts = $query->where('name', 'like', '%'.$this->query.'%')
            ->paginate($this->perPage);

        return view('livewire.admin.contact.index', compact('contacts'));
    }

    public function showModal(Contact $contact)
    {
        $this->resetErrorBag();

        $this->resetValidation();

        $this->contact = $contact;

        $this->showModal = true;
    }

    public function delete($id)
    {
        $contact = Contact::find($id);

        $this->authorize('delete', $contact);

        $contact->delete();

        session()->flash('message', 'Contact successfully deleted.');
    }
}
