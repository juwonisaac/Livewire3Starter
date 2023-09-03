<?php

namespace App\Livewire\Forms;

use App\Models\Section;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class SectionForm extends Form
{
    use WithFileUploads;

    public ?Section $section;

    #[Rule('required', 'max:255')]
    public $title;

    #[Rule('nullable', 'max:255')]
    public $subtitle;

    #[Rule('required|min:3')]
    public $description;

    #[Rule('nullable|string ')]
    public $link;

    #[Rule('nullable|string|max:255 ')]
    public $label;

    #[Rule('nullable')]
    public $bg_color;

    #[Rule('required')]
    public $type;

    #[Rule('nullable|integer|exists:pages,id')]
    public $page_id;

    public $image;

    public function setPost(Section $section)
    {
        $this->section = $section;

        $this->title = $section->title;

        $this->description = $section->description;

        $this->subtitle = $section->subtitle;

        $this->link = $section->link;

        $this->label = $section->label;

        $this->bg_color = $section->bg_color;

        $this->type = $section->type;

        $this->page_id = $section->page_id;

        $this->image = $section->image;
    }

    public function store()
    {
        if (!$this->image) {
            $this->image = null;
        } elseif (is_object($this->image) && method_exists($this->image, 'extension')) {
            $fileName = $this->title . '.' . $this->image->extension();
            $this->image->store('sections', $fileName);
            $this->image = $fileName;
        }

        Section::create($this->all());
    }

    public function update()
    {
        $this->validate();

        if (!$this->image) {
            $this->image = null;
        } elseif (is_object($this->image) && method_exists($this->image, 'extension')) {
            $fileName = Str::slug($this->title) . '.' . $this->image->extension();
            $this->image->storeAs('sections', $fileName, 'images');
            $this->image = $fileName;
        }

        $this->section->update(
            $this->all()
        );
        // dd($this->section); 
    }
}
