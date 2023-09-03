<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    public $table = 'contacts';

    public $orderable = [
        'id', 'name', 'email', 'phone_number', 'message', 'created_at',
    ];

    public $filterable = [
        'id', 'name', 'email', 'phone_number', 'message',
    ];

    protected $fillable = [
        'id', 'name', 'email', 'phone_number', 'message',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
