<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        Section::insert([
            [
                'subtitle' => 'Bienvenue',
                'title' => 'Livewire 3 Starter Kit',
                'description' => 'Livewire 3 Starter Kit',
                'image' => 'section.jpg',
                'bg_color' => 'bg-white',
                'featured' => 1,

                'link' => 'https://www.github.com/zakarialabib/Livewire-3-Starter-Kit',
            ],
        ]);
    }
}
