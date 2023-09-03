<?php

declare(strict_types=1);

namespace App\Models;

use App\Enums\PageType;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public $table = 'sections';

    protected $fillable = [
        'title', 'subtitle', 'description', 'image',
        'text_color', 'label', 'page_id', 'type',
        'featured', 'link', 'bg_color', 'status',
    ];

    protected $casts = [
        'featured' => 'boolean',
        'status' => Status::class,
        'type' => PageType::class,
    ];

    /**
     * Scope a query to only include active products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('status', 1);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
