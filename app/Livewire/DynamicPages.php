<?php

namespace App\Livewire;

use App\Models\Page;
use App\Models\Section;
use Livewire\Component;
use App\Traits\LazySpinner;

class DynamicPages extends Component
{
    
    use LazySpinner;
    public $page;

    public $section;

    public $content;

    public $type;

    public $cardContent = [];


    public function mount($slug)
    {
        $this->page = Page::where('slug', $slug)->firstOrFail();
        $this->section = Section::where('type', $this->page->type)
            ->where('page_id', $this->page->id)
            ->first();
        $this->type = $this->page->type;
        $this->content = $this->page->content;
        $this->cardContent = $this->page->cardContent;
    }
    public function render()
    {
        return view('livewire.dynamic-pages'); 
    }
}
