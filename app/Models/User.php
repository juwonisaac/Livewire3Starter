<?php

declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasRoles;

    public $orderable = [
        'id', 'name',   'city', 'country',
        'phone', 'email', 'password', 'created_at', 'updated_at',
    ];

    protected $filterable = [
        'name',   'city', 'country',
        'phone', 'email', 'password', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id', 'name',   'city', 'country', 'address',
        'phone', 'email', 'password', 'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->roles->pluck('name')->contains(Role::ROLE_ADMIN);
    }

    public function isClient()
    {
        return $this->roles->pluck('name')->contains(Role::ROLE_CLIENT);
    }

    public function formSubmissions()
    {
        return $this->hasMany(FormSubmission::class);
    }
}
