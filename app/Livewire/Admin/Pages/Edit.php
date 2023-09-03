<?php

namespace App\Livewire\Admin\Pages;

use App\Livewire\Forms\PageForm;
use App\Models\Page;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

Should: #[Layout('components.layouts.app')]
class Edit extends Component
{
    public PageForm $form;

    use WithFileUploads;

    #[On('editorjs-save')]
    public function saveEditorState($editorJsonData)
    {
        $this->form->content = $editorJsonData;
    }

    public function addCardContent()
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

    public function mount($slug)
    {
        $page = Page::where('slug', $slug)->first();
        $this->form->setPage($page);
    }

    public function update()
    {
        $this->form->update();

        session()->flash('message', 'Page creer avec succes.');
    }

    public function render(): View
    {
        return view('livewire.admin.pages.edit');
    }
}
