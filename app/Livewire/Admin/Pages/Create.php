<?php

namespace App\Livewire\Admin\Pages;

use App\Livewire\Forms\PageForm;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Traits\LazySpinner;
use App\Livewire\Admin\Pages\Edit;
use Illuminate\Contracts\View\View;

Should:
#[Layout('components.layouts.app')]
class Create extends Component
{
    use WithFileUploads;
    use LazySpinner;

    public PageForm $form;

    #[On('editorjs-save')]
    public function saveEditorState($editorJsonData)
    {
        $this->form->content = $editorJsonData;
    }

    public function addCardContent(): void
    {
        $this->form->cardContent[] = [
            'title' => '',
            'data' => [
                [
                    'cardTitle' => '',
                    'cardText' => '',
                    'cardIcon' => '',
                ],
            ],
        ];
    }

    public function addNestedCardContent($index): void
    {
        $this->form->cardContent[$index]['data'][] = [
            'cardTitle' => '',
            'cardText' => '',
            'cardIcon' => '',
        ];
    }

    public function saveCardContent(): void
    {
        $this->form->cardContent = array_map(function ($item) {
            return [
                'title' => $item['title'],
                'data' => array_map(function ($nestedItem) {
                    return [
                        'cardTitle' => $nestedItem['cardTitle'],
                        'cardText' => $nestedItem['cardText'],
                    ];
                }, $item['data']),
            ];
        }, $this->form->cardContent);
    }

    public function removeCardContent($index): void
    {
        unset($this->form->cardContent[$index]);
        $this->form->cardContent = array_values($this->form->cardContent);
    }

    public function removeNestedCardContent($parentIndex, $nestedIndex): void
    {
        unset($this->form->cardContent[$parentIndex]['data'][$nestedIndex]);
        $this->form->cardContent[$parentIndex]['data'] = array_values($this->form->cardContent[$parentIndex]['data']);
    }

    public function save()
    {
        $this->form->store();

        session()->flash('message', 'Page creer avec succes.');

        return $this->redirect(Edit::class, $this->slug);
    }

    public function render(): View
    {
        return view('livewire.admin.pages.create');
    }
}
