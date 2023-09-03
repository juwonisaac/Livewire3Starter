<?php

namespace App\Livewire\Admin;

use App\Models\FormSubmission;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Component;
use App\Traits\LazySpinner;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

Should:
#[Layout('components.layouts.app')] class UserTable extends Component
{
    use LivewireAlert;
    use LazySpinner;
    use WithPagination;

    public $formSubmissions;

    protected $queryString = [
        'search' => ['keep' => false],
    ];

    public $activeTab;

    public int $perPage;

    public $query = '';

    public array $paginationOptions;

    public function mount()
    {
        $this->perPage = 25;
        $this->paginationOptions = [25, 50, 100];

        $this->activeTab = $this->activeTab ?? 'list';
    }

    public function delete($id)
    {
        $user = User::find($id);

        $this->authorize('delete', $user);

        $user->delete();

        session()->flash('message', 'User successfully deleted.');
    }

    public function showTab($id, $type)
    {
        $this->formSubmissions = FormSubmission::whereId($id)->first();
        $this->activeTab = 'show';
    }

    public function closeTab()
    {
        $this->activeTab = 'list';
    }

    public function render()
    {
        $query = User::with('formSubmissions');

        $users = $query->where('name', 'like', '%' . $this->query . '%')
            ->paginate($this->perPage);

        return view('livewire.admin.user-table', compact('users'));
    }
}
