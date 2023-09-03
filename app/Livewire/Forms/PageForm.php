<?php

namespace App\Livewire\Forms;

use App\Models\Page;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Livewire\WithFileUploads;

class PageForm extends Form
{
    use WithFileUploads;

    public $page;

    #[Rule('required|min:5')]
    public $title = '';

    #[Rule('array')]
    public $content = [];

    public $slug;

    #[Rule('required')]
    public $type;

    #[Rule('nullable')]
    public $before_registration;

    #[Rule('nullable')]
    public $after_registration;

    #[Rule('image|nullable')]
    public $image;

    #[Rule('nullable')]
    public bool $status = true;

    #[Rule('array')]
    public $cardContent = [];

    public $created_at;

    public $updated_at;

    public function setPage(Page $page)
    {
        $this->page = $page;

        $this->title = $page->title;

        $this->content = $page->content;

        $this->type = $page->type->value;

        $this->before_registration = $page->before_registration;

        $this->after_registration = $page->after_registration;

        $this->status = $page->status;

        $this->cardContent = is_array($this->page->cardContent) ? $this->page->cardContent : [];

        $this->image = $page->image;

        $this->slug = $page->slug;

        $this->updated_at = $page->updated_at;

        $this->created_at = $page->created_at;

    }

    public function store()
    {
        if ($this->image) {
            $fileName = $this->title.'.'.$this->image->extension();
            $this->image->storeAs('pages', $fileName);
            $this->image = $fileName;
        }

        $this->slug = Str::slug($this->title);

        Page::create($this->all());
    }

    public function update()
    {
        if ($this->image) {
            $fileName = $this->title.'.'.$this->image->extension();
            $this->image->storeAs('pages', $fileName);
            $this->image = $fileName;
        }

        $validated = $this->validate();
        
        $this->page->update($validated);
    }
}
