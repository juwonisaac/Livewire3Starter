<?php

namespace App\Models;

use App\Enums\PageType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'status', 'title',
        'before_registration', 'after_registration',
        'slug', 'type', 'cardContent',
    ];

    protected $casts = [
        'content' => 'json',
        'cardContent' => 'json',
        'type' => PageType::class,
    ];
}
